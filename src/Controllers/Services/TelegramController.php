<?php

namespace Reactmore\TelegramBotSdk\Controllers\Services;

use Reactmore\TelegramBotSdk\Conversation;
use Reactmore\TelegramBotSdk\Telegram;
use Reactmore\TelegramBotSdk\Exception\TelegramException;
use Reactmore\TelegramBotSdk\Entities\Update;

class TelegramController extends BaseServicesController
{
    protected $telegram;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        
        if ($this->telegramSettings->localServer) {
            \Reactmore\TelegramBotSdk\Request::setCustomBotApiUri($this->telegramSettings->customBotApiUrl, '/downloadss/bot{API_KEY}');
        }


        $this->telegram = service('telegram');
    }

    public function index()
    {
        try {
            // $this->telegram->setUpdateFilter(function (Update $update, Telegram $telegram) {


            //     $data = null;
            //     if ($update->getCallbackQuery() && $update->getCallbackQuery()->getFrom()) {
            //         $data = $update->getCallbackQuery()->getFrom();
            //     } elseif ($update->getMessage() && $update->getMessage()->getFrom()) {
            //         $data = $update->getMessage()->getFrom();
            //     }

            //     if ($data) {
            //         $usersModel = model('App\Models\UsersModel');
            //         $usersModel->insertUser($data, $telegram); 
            //     }

            //     $chat_id = ($update->getCallbackQuery() ? $update->getCallbackQuery()->getMessage()->getChat()->getId() : $update->getMessage()->getChat()->getId());
            //     $user_id = ($update->getCallbackQuery() ? $update->getCallbackQuery()->getFrom()->getId() : $update->getMessage()->getFrom()->getId());

            //     $user = $this->usersModel->getUserById($user_id);

            //     // set language code 
            //     service('request')->setLocale('id');

            //     if ($user && $user->is_block && !in_array($user_id, $telegram->getAdminList())) {
            //         if ($update->getCallbackQuery() && $command = $update->getCallbackQuery()->getData()) {
            //             if ($command == 'c=common&a=contact') {
            //                 return true;
            //             }
            //         }
            //         $conversation = new Conversation(
            //             $user_id,
            //             $chat_id,
            //         );

            //         // Fetch conversation command if it exists and execute it.
            //         if ($conversation->exists() && $conversation->getCommand() == 'contact') {
            //             return true;
            //         }

            //         return $this->handleBlockUser($user);
            //     }
            //     return true;
            // });

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
}
