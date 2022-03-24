<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to(base_url('dashboard'));
        }

        $data = [
            'title' => 'Login | Car Wash @ qadrlabs.com'
        ];

        return view('auth/login', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $credentials = ['username' => $username];

        $user = $this->model->where($credentials)
            ->first();

        if (!$user) {
            session()->setFlashdata('error', 'Username atau password anda salah.');
            return redirect()->back();
        }

        // $passwordCheck = password_verify($password, $user['password']);

        // if (! $passwordCheck) {
        //     session()->setFlashdata('error', 'Email atau password anda salah.');
        //     return redirect()->back();
        // }

        // konfirmasi data login
        $userData = [
            'username' => $user['username'],
            'password' => $user['password'],
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to(base_url('dashboard'));
    }
}
