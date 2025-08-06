<?php

namespace Reactmore\TelegramBotSdk\Entities;

use JsonSerializable;
use Reactmore\TelegramBotSdk\Entities\InlineQuery\InlineEntity;
use Reactmore\TelegramBotSdk\Entities\InputMedia\InputMedia;

/**
 * Class Entity
 *
 * This is the base class for all entities.
 *
 * @see https://core.telegram.org/bots/api#available-types
 *
 * @method string getBotUsername() Return the bot name passed to this entity
 * @method array  getRawData()     Get the raw data passed to this entity
 */
abstract class Entity implements JsonSerializable
{
    public static $fixThumbnailRename = true;
    public $bot_username              = '';
    public $raw_data                  = [];
    private $fields                   = [];

    /**
     * Entity constructor.
     *
     * @todo Get rid of the $bot_username, it shouldn't be here!
     */
    public function __construct(array $data, string $bot_username = '')
    {
        $this->bot_username = $bot_username;
        $this->raw_data     = $data;

        $this->assignMemberVariables($data);
        $this->validate();
    }

    /**
     * Dynamically set a field.
     *
     * @param mixed $value
     */
    public function __set(string $name, $value): void
    {
        $this->fields[$name] = $value;
    }

    /**
     * Gets a dynamic field.
     *
     * @return mixed|null
     */
    public function __get(string $name)
    {
        return $this->fields[$name] ?? null;
    }

    /**
     * Return the data that should be serialized for Telegram.
     */
    public function jsonSerialize(): array
    {
        return $this->fields;
    }

    /**
     * Perform to json
     */
    public function toJson(): string
    {
        return json_encode($this);
    }

    /**
     * Perform to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * Helper to set member variables
     */
    protected function assignMemberVariables(array $data): void
    {
        foreach ($data as $key => $value) {
            $key          = $this->fixThumbnailRename($key);
            $this->{$key} = $value;
        }
    }

    /**
     * Get the list of the properties that are themselves Entities
     */
    protected function subEntities(): array
    {
        return [];
    }

    /**
     * Perform any special entity validation
     */
    protected function validate(): void
    {
    }

    /**
     * Get a property from the current Entity
     *
     * @param mixed $default
     *
     * @return mixed
     */
    public function getProperty(string $property, $default = null)
    {
        return $this->{$property} ?? $default;
    }

    /**
     * Return the variable for the called getter or magically set properties dynamically.
     *
     * @return mixed|null
     */
    public function __call($method, $args)
    {
        $method = $this->fixThumbnailRename($method);

        // Convert method to snake_case (which is the name of the property)
        $property_name = mb_strtolower(ltrim(preg_replace('/[A-Z]/', '_$0', substr($method, 3)), '_'));
        $property_name = $this->fixThumbnailRename($property_name);

        $action = substr($method, 0, 3);
        if ($action === 'get') {
            $property = $this->getProperty($property_name);

            if ($property !== null) {
                // Get all sub-Entities of the current Entity
                $sub_entities = $this->subEntities();

                if (isset($sub_entities[$property_name])) {
                    $class = $sub_entities[$property_name];

                    if (is_array($class)) {
                        return $this->makePrettyObjectArray(reset($class), $property_name);
                    }

                    return Factory::resolveEntityClass($class, $property, $this->getProperty('bot_username'));
                }

                return $property;
            }
        } elseif ($action === 'set') {
            // Limit setters to specific classes.
            if ($this instanceof InlineEntity || $this instanceof InputMedia || $this instanceof Keyboard || $this instanceof KeyboardButton) {
                $this->{$property_name}         = $args[0];
                $this->raw_data[$property_name] = $args[0];

                return $this;
            }
        }

        return null;
    }

    /**
     * BC for renamed thumb -> thumbnail methods and fields
     *
     * @todo Remove after a few versions.
     */
    protected function fixThumbnailRename(string $name): string
    {
        return self::$fixThumbnailRename ? preg_replace('/([Tt])humb(nail)?/', '$1humbnail', $name, -1, $count) : $name;
        /*if ($count) {
            // Notify user that there are still outdated method calls?
        }*/
    }

    /**
     * Return an array of nice objects from an array of object arrays
     *
     * This method is used to generate pretty object arrays
     * mainly for PhotoSize and Entities object arrays.
     */
    protected function makePrettyObjectArray(string $class, string $property_name): array
    {
        $objects      = [];
        $bot_username = $this->getProperty('bot_username');

        $properties = array_filter($this->getProperty($property_name) ?: []);

        foreach ($properties as $property) {
            $objects[] = Factory::resolveEntityClass($class, $property, $bot_username);
        }

        return $objects;
    }

    /**
     * Escape markdown (v1) special characters
     *
     * @see https://core.telegram.org/bots/api#markdown-style
     */
    public static function escapeMarkdown(string $string): string
    {
        return str_replace(
            ['[', '`', '*', '_'],
            ['\[', '\`', '\*', '\_'],
            $string,
        );
    }

    /**
     * Escape markdown (v2) special characters
     *
     * @see https://core.telegram.org/bots/api#markdownv2-style
     */
    public static function escapeMarkdownV2(string $string): string
    {
        return str_replace(
            ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'],
            ['\_', '\*', '\[', '\]', '\(', '\)', '\~', '\`', '\>', '\#', '\+', '\-', '\=', '\|', '\{', '\}', '\.', '\!'],
            $string,
        );
    }

    /**
     * Try to mention the user
     *
     * Mention the user with the username otherwise print first and last name
     * if the $escape_markdown argument is true special characters are escaped from the output
     *
     * @todo What about MarkdownV2?
     *
     * @param bool $escape_markdown
     */
    public function tryMention($escape_markdown = false): string
    {
        // TryMention only makes sense for the User and Chat entity.
        if (! ($this instanceof User || $this instanceof Chat)) {
            return '';
        }

        // Try with the username first...
        $name        = $this->getProperty('username');
        $is_username = $name !== null;

        if ($name === null) {
            // ...otherwise try with the names.
            $name      = $this->getProperty('first_name');
            $last_name = $this->getProperty('last_name');
            if ($last_name !== null) {
                $name .= ' ' . $last_name;
            }
        }

        if ($escape_markdown) {
            $name = self::escapeMarkdown($name);
        }

        return ($is_username ? '@' : '') . $name;
    }
}
