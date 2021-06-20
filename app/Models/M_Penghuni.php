<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Penghuni extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAllData()
    {
        return $this->db->table('tb_penghuni')->get();
    }
    public function tambah($data)
    {
        return $this->db->table('tb_penghuni')->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table('tb_penghuni')->delete(['id_penghuni' => $id]);
    }
}

?>