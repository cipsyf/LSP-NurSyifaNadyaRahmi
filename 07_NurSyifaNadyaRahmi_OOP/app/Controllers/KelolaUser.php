<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KelolaModel;

class KelolaUser extends BaseController
{

    protected $user;
    protected $table = "tbuser";

    public function __construct()
    {
        $this->user = new KelolaModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Daftar Pengguna | Car Wash @ qadrlabs.com'
        ];

        $getdata = $this->user->getdata();

        $datas = array(
            'dataUser' => $getdata,
        );

        return view('kelolauser', $datas, $data);
    }

    public function edit()
    {
        $iduser = $this->request->getPost("iduser");
        $username = $this->request->getPost("username");

        $data = [
            'username' => $username
        ];

        $where = ['iduser' => $iduser];

        try {
            $edit = $this->user->editData($this->table, $data, $where);
            if ($edit) {
                echo "<script>alert('Berhasil diupdate!'); window.location='" . base_url('kelolauser') . "'</script>";
            } else {
                echo "<script>alert('Gagal diupdate!'); window.location='" . base_url('kelolauser') . "'</script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Username sudah terpakai!'); window.location='" . base_url('kelolauser') . "'</script>";
        }
    }

    public function hapus($iduser)
    {

        $where = ['iduser' => $iduser];

        try {
            $hapus = $this->user->hapusData($this->table, $where);
            if ($hapus) {
                echo "<script>alert('Berhasil dihapus!'); window.location='" . base_url('kelolauser') . "'</script>";
            } else {
                echo "<script>alert('Gagal dihapus!'); window.location='" . base_url('kelolauser') . "'</script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Username sudah terpakai!'); window.location='" . base_url('kelolauser') . "'</script>";
        }
    }
}
