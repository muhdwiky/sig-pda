<?php

namespace App\Controllers;

use App\Models\ModelWilayah;
use App\Models\ModelPengaturan;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPengaturan = new ModelPengaturan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'menu' => 'dashboard',
            'isi' => 'v_dashboard',
            'wilayah' => $this->ModelWilayah->AllData(),
            'web' => $this->ModelPengaturan->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Pengaturan()
    {
        $data = [
            'judul' => 'Pengaturan',
            'menu'  => 'pengaturan',
            'isi' => 'v_pengaturan',
            'web' => $this->ModelPengaturan->DataWeb(),
            'provinsi' => $this->ModelPengaturan->allProvinsi(),

        ];
        return view('v_template_back_end', $data);
    }

    // Kabupaten
    public function Kabupaten()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $kab = $this->ModelPengaturan->allKabupaten($id_provinsi);
        echo '<option value="">--Pilih Kabupaten---</option>';
        foreach ($kab as $key => $value) {
            echo '<option value=' . $value['id_kabupaten'] . '>' . $value['nama_kabupaten'] . '</option>';
        }
    }

    public function UpdatePengaturan()
    {
        $data = [
            'id' => 1,
            'nama_web' => $this->request->getPost('nama_web'),
            'koordinat_wilayah' => $this->request->getPost('koordinat_wilayah'),
            'zoom_view' => $this->request->getPost('zoom_view'),
            'id_provinsi' => $this->request->getPost('id_provinsi'),
            'id_kabupaten' => $this->request->getPost('id_kabupaten'),
        ];
        $this->ModelPengaturan->UpdateData($data);
        session()->setFlashdata('pesan', 'Pengaturan Web Telah Diubah !!!');
        return redirect()->to('Admin/Pengaturan');
    }
}
