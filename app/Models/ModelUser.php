<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_user')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function DetailData($id_user)
    {
        return $this->db->table('tbl_user')
            ->join('tbl_role', 'tbl_role.id_role=tbl_user.id_role', 'LEFT')
            ->where('id_user', $id_user)
            ->get()->getRowArray();
    }

    public function JoinUserRole()
    {
        return $this->db->table('tbl_user')
            ->join('tbl_role', 'tbl_role.id_role=tbl_user.id_role', 'LEFT')
            ->get()->getResultArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }

    public function allRole()
    {
        return $this->db->table('tbl_role')
            ->get()->getResultArray();
    }
}
