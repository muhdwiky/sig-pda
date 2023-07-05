<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengaturan extends Model
{
    public function DataWeb()
    {
        return $this->db->table('tbl_pengaturan')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten=tbl_pengaturan.id_kabupaten', 'LEFT')
            ->where('id', 1)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_pengaturan')
            ->where('id', 1)
            ->update($data);
    }

    public function allProvinsi()
    {
        return $this->db->table('tbl_provinsi')
            ->orderBy('id_provinsi', 'ASC')
            ->get()->getResultArray();
    }

    public function allKabupaten($id_provinsi)
    {
        return $this->db->table('tbl_kabupaten')
            ->where('id_provinsi', $id_provinsi)
            ->get()->getResultArray();
    }
}
