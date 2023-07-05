<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWilayah extends Model
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
        return $this->db->table('tbl_wilayah')
            ->get()->getResultArray();
    }

    public function TambahData($data)
    {
        $this->db->table('tbl_wilayah')->insert($data);
    }

    public function DetailData($id_wilayah)
    {
        return $this->db->table('tbl_wilayah')
            ->where('id_wilayah', $id_wilayah)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_wilayah')
            ->where('id_wilayah', $data['id_wilayah'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_wilayah')
            ->where('id_wilayah', $data['id_wilayah'])
            ->delete($data);
    }
}
