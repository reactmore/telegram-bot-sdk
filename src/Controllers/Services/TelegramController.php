<?php

namespace Reactmore\TelegramBotSdk\Controllers\Services;

use Reactmore\TelegramBotSdk\Conversation;
use Reactmore\TelegramBotSdk\Telegram;
use Reactmore\TelegramBotSdk\Exception\TelegramException;
use Reactmore\TelegramBotSdk\Entities\Update;

class TelegramController extends BaseServicesController
{
    protected $telegram;

    protected $usersModel;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->usersModel = model('Reactmore\TelegramBotSdk\Models\UsersModel');

        if ($this->telegramSettings->localServer) {
            \Reactmore\TelegramBotSdk\Request::setCustomBotApiUri($this->telegramSettings->customBotApiUrl);
        }


        $this->telegram = service('telegram');
    }

    public function index()
    {
        try {
            $this->telegram->setUpdateFilter(function (Update $update, Telegram $telegram) {
                $message = $update->getMessage() ?: $update->getCallbackQuery()->getMessage();

                $chat    = $message->getChat();
                $user    = $message->getFrom();
                $chat_id = $chat->getId();
                $user_id = $user->getId();

                if ($user) {
                    $this->usersModel->updatedUsersBot($user, $telegram);
                }

                $user = $this->usersModel->getUserById($user_id);

                // set language code 
                service('request')->setLocale('id');

                if ($user && $user->is_block && !in_array($user_id, $telegram->getAdminList())) {
                    if ($update->getCallbackQuery() && $command = $update->getCallbackQuery()->getData()) {
                        if ($command == 'c=common&a=contact') {
                            return true;
                        }
                    }
                    $conversation = new Conversation(
                        $user_id,
                        $chat_id,
                    );

                    // Fetch conversation command if it exists and execute it.
                    if ($conversation->exists() && $conversation->getCommand() == 'contact') {
                        return true;
                    }

                    return $this->handleBlockUser($chat_id);
                }
                return true;
            });

            $this->telegram->handle();
        } catch (TelegramException $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
        }
    }

    public function setWebhook()
    {
        return $this->processWebhook('set');
    }

    public function deleteWebhook()
    {
        return $this->processWebhook('delete');
    }

    protected function processWebhook($action)
    {
        $baseUrlWebhook = base_url('telegram/hook');
        try {
            $result = ($action === 'set')
                ? $this->telegram->setWebhook($baseUrlWebhook)
                : $this->telegram->deleteWebhook();

            if ($result->isOk()) {
                return json_encode([
                    'success' => true,
                    'message' => $result->getDescription()
                ]);
            }

            return json_encode([
                'success' => false,
                'message' => $result->getDescription()
            ]);
        } catch (TelegramException $e) {
            if ($action === 'delete') {
                return json_encode([
                    'success' => false,
                    'message' => 'Webhook deletion assumed successful (forced).'
                ]);
            }

            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    protected function handleBlockUser($chat_id)
    {
        $result = \Reactmore\TelegramBotSdk\Request::sendMessage([
            'chat_id'       => $chat_id,
            'text'          => 'You have been blocked, all functions, history, your membership cannot be accessed!',
            'reply_markup'  => createCustomKeyboard([
                ['text' => 'Open Block', 'callback_data' => 'c=common&a=contact'],
            ], 1),
        ]);

        if ($result->isOk()) {
            return false;
        }
    }
}
