<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbuser';
    protected $allowedFields = ['username', 'password'];

    protected $validationRules = [
        'username' => 'required',
        'password' => 'required'
    ];

    protected $skipValidation = false;
    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['password'])) {
            return $data;
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $data;
    }
}
