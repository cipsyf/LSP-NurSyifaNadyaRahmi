<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function total_transaksi()
    {
        return $this->db->table('tbtransaksi')->countAll();
    }

    public function total_user()
    {
        return $this->db->table('tbuser')->countAll();
    }
}
