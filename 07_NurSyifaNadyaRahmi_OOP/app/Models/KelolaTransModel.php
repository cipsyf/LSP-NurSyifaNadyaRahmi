<?php

namespace App\Models;

use CodeIgniter\Model;

class KelolaTransModel extends Model
{

    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM tbtransaksi ORDER BY idtransaksi DESC");

        return $query->getResult();
    }
}
