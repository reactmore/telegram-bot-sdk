<?php

namespace Reactmore\TelegramBotSdk\Entities\PaidMedia;

use Reactmore\TelegramBotSdk\Entities\Entity;

/**
 * Class PaidMedia
 *
 * This object describes the paid media.
 *
 * @see https://core.telegram.org/bots/api#paidmedia
 *
 * @method string getType() Type of the paid media
 */
abstract class PaidMedia extends Entity
{
    /**
     * {@inheritDoc}
     */
    public static function getFactory($data)
    {
        $type = $data['type'] ?? null;

        switch ($type) {
            case 'preview':
                return new PaidMediaPreview($data);

            case 'photo':
                return new PaidMediaPhoto($data);

            case 'video':
                return new PaidMediaVideo($data);

            default:
                // return new static($data);
                // throw new TelegramException('Unsupported paid media type: ' . $type);
                // Return a base PaidMedia object or handle as an error
                return new class ($data) extends PaidMedia {
                    protected function subEntities(): array
                    {
                        return [];
                    }
                };
        }
    }
}
