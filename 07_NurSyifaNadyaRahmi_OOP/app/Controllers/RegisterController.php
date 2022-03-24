<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        $data = [
            'title' => 'Register | Car Wash @ qadrlabs.com'
        ];

        return view('auth/register', $data);
    }

    public function indextambahuser()
    {
        $data = [
            'title' => 'Register | Car Wash @ qadrlabs.com'
        ];

        return view('tambahuser', $data);
    }

    public function store()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = [
            'username' => $username,
            'password' => $password
        ];

        $save = $this->model->save($user);

        if ($save) {
            session()->setFlashdata('success', 'Register Berhasil!');
            return redirect()->to(base_url('login'));
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }

    public function simpan()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = [
            'username' => $username,
            'password' => $password
        ];

        $save = $this->model->save($user);

        if ($save) {
            session()->setFlashdata('success', 'Berhasil ditambahkan!');
            return redirect()->to(base_url('kelolauser'));
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }
}
