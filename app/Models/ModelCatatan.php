<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCatatan extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_catatan')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_catatan')->insert($data);
    }

    public function DetailData($id_catatan)
    {
        return $this->db->table('tbl_catatan')
            ->join('tbl_user', 'tbl_user.id_user=tbl_catatan.id_user', 'LEFT')
            ->join('tbl_toko', 'tbl_toko.id_toko=tbl_catatan.id_toko', 'LEFT')
            ->where('id_catatan', $id_catatan)
            ->get()->getRowArray();
    }

    // Join Untuk Tabel Catatan dengan Primary Key Pada Tabel User dan Tabel Toko
    public function JoinForAll()
    {
        return $this->db->table('tbl_catatan')
            ->join('tbl_user', 'tbl_user.id_user=tbl_catatan.id_user', 'LEFT')
            ->join('tbl_toko', 'tbl_toko.id_toko=tbl_catatan.id_toko', 'LEFT')
            ->get()->getResultArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_catatan')
            ->where('id_catatan', $data['id_catatan'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_catatan')
            ->where('id_catatan', $data['id_catatan'])
            ->delete($data);
    }

    // public function allToko()
    // {
    //     return $this->db->table('tbl_toko')
    //         ->get()->getResultArray();
    // }

    // public function allUser()
    // {
    //     return $this->db->table('tbl_user')
    //         ->get()->getResultArray();
    // }
}
