<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KelolaModel;

class ProfileController extends BaseController
{

    protected $user;
    protected $table = "tbuser";

    public function __construct()
    {
        $this->user = new KelolaModel();
    }

    // mengirim judul
    public function index()
    {
        $data = [
            'title' => 'Profile || Car Wash @ qadrlabs.com'
        ];

        return view('profile', $data);
    }
}
