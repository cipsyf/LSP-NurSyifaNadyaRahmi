<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KelolaTransModel;

class KelolaTransaksi extends BaseController
{

    protected $transaksi;
    protected $table = "tbtransaksi";

    public function __construct()
    {
        $this->transaksi = new KelolaTransModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Transaksi | Car Wash @ qadrlabs.com'
        ];

        $getdata = $this->transaksi->getdata();

        $datas = array(
            'dataTransaksi' => $getdata,
        );

        return view('kelolatransaksi', $datas, $data);
    }

    public function delete($idtransaksi)
    {
        $this->KelolaTransModel->delete($idtransaksi);

        return redirect()->to('kelolatransaksi');
    }
}
