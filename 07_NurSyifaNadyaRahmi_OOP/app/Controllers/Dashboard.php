<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DashboardModel;

class Dashboard extends BaseController
{

    public function __construct()
    {
        $this->DashboardModel = new DashboardModel();
    }


    public function index()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Dashboard | Car Wash @ qadrlabs.com',
            'total_transaksi' => $this->DashboardModel->total_transaksi(),
            'total_user' => $this->DashboardModel->total_user()
        ];

        return view('dashboard', $data);
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }
}
