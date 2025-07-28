<?php

namespace Reactmore\TelegramBotSdk\Models;

use Reactmore\TelegramBotSdk\Models\BaseModel;

class UsersModel extends BaseModel
{
    protected $table;

    public function __construct()
    {
        $this->table = 'users';
        parent::__construct($this->table);
    }

    public function updatedUsersBot($user, \Reactmore\TelegramBotSdk\Telegram $telegram): bool
    {
        try {
            $data = [
                'id' =>  $user->getId(),
                'is_bot' => $user->getIsBot(),
                'username' => $user->getUsername(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'language_code' => $user->getLanguageCode(),
                'is_premium' => $user->getIsPremium(),
                'added_to_attachment_menu' => $user->getAddedToAttachmentMenu(),
            ];

            if (in_array($data['id'], $telegram->getAdminList())) {
                $data['password'] = password_hash('1234', PASSWORD_DEFAULT);
                $data['role'] = 'admin';
            }
            $user = $this->getUserById($data['id']);
            if (empty($user)) {
                $status = $this->ci_save($data);
            } else {
                $data['updated_at'] = date('Y-m-d H:i:s');
                unset($data['id']);
                unset($data['language_code']);
                if (!empty($user->password)) {
                    unset($data['password']);
                }
                $status = $this->ci_save($data, $user->id);
            }

            // Simpan data pengguna
            return $status;
        } catch (\Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            return false;
        } 
    }

    //get bot by id
    public function getUserById($id)
    {
        return $this->db_builder->where($this->table . '.id', cleanNumber($id))->get()->getRow();
    }
}
