<?php

namespace App\Models;

use CodeIgniter\Model;

class KelolaModel extends Model
{

    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM tbuser ORDER BY iduser DESC");

        return $query->getResult();
    }

    public function editData($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);

        return true;
    }

    public function hapusData($table, $where)
    {
        $this->db->table($table)->delete($where);

        return true;
    }
}
