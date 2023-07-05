<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelToko extends Model
{
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

    public function allKecamatan($id_kabupaten)
    {
        return $this->db->table('tbl_kecamatan')
            ->where('id_kabupaten', $id_kabupaten)
            ->get()->getResultArray();
    }

    public function AllData()
    {
        return $this->db->table('tbl_toko')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_toko')->insert($data);
    }

    public function DetailData($id_toko)
    {
        return $this->db->table('tbl_toko')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi=tbl_toko.id_provinsi', 'LEFT')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten=tbl_toko.id_kabupaten', 'LEFT')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan=tbl_toko.id_kecamatan', 'LEFT')
            ->join('tbl_wilayah', 'tbl_wilayah.id_wilayah=tbl_toko.id_wilayah', 'LEFT')
            ->where('id_toko', $id_toko)
            ->get()->getRowArray();
    }

    public function JoinForALl()
    {
        return $this->db->table('tbl_toko')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi=tbl_toko.id_provinsi', 'LEFT')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten=tbl_toko.id_kabupaten', 'LEFT')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan=tbl_toko.id_kecamatan', 'LEFT')
            ->join('tbl_wilayah', 'tbl_wilayah.id_wilayah=tbl_toko.id_wilayah', 'LEFT')
            ->get()->getResultArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_toko')
            ->where('id_toko', $data['id_toko'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_toko')
            ->where('id_toko', $data['id_toko'])
            ->delete($data);
    }
}
