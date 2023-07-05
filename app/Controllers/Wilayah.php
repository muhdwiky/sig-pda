<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelWilayah;
use App\Models\ModelPengaturan;

class Wilayah extends BaseController
{
    public function __construct()
    {
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPengaturan = new ModelPengaturan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Wilayah',
            'menu' => 'wilayah',
            'isi' => 'wilayah/v_index',
            'wilayah' => $this->ModelWilayah->AllData(),
            'web' => $this->ModelPengaturan->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Tambah()
    {
        $data = [
            'judul' => 'Tambah Wilayah',
            'menu' => 'wilayah',
            'isi' => 'wilayah/v_tambah',
            'wilayah' => $this->ModelWilayah->AllData(),
            'web' => $this->ModelPengaturan->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function TambahData()
    {
        if ($this->validate([
            'nama_wilayah' => [
                'label' => 'Nama Wilayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'geojson' => [
                'label' => 'Data GeoJson',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'warna' => [
                'label' => 'warna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan Tentukan Warna !!!'
                ]
            ],
            // 'opacity' => [
            //     'label' => 'opacity',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Silahkan Tentukan Opacity !!!'
            //     ]
            // ],
        ])) {
            //Jika Validasi Berhasil
            $data = [
                'nama_wilayah' => $this->request->getPost('nama_wilayah'),
                'warna' => $this->request->getPost('warna'),
                // 'opacity' => $this->request->getPost('opacity'),
                'geojson' => $this->request->getPost('geojson'),
            ];
            $this->ModelWilayah->TambahData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Wilayah');
        } else {
            //Jika Validasi Gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Wilayah/Tambah')->withInput('validation', \Config\Services::validation());
        }

        $this->ModelPengaturan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Wilayah Berhasil Ditambah !!!');
        return redirect()->to('Wilayah');
    }

    public function Ubah($id_wilayah)
    {
        $data = [
            'judul' => 'Ubah Wilayah',
            'menu' => 'wilayah',
            'isi' => 'wilayah/v_ubah',
            'wilayah' => $this->ModelWilayah->DetailData($id_wilayah),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_wilayah)
    {
        if ($this->validate([
            'nama_wilayah' => [
                'label' => 'Nama Wilayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'geojson' => [
                'label' => 'Data GeoJson',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'warna' => [
                'label' => 'warna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan Tentukan Warna !!!'
                ]
            ],
        ])) {
            //Jika Validasi Berhasil
            $data = [
                'id_wilayah' => $id_wilayah,
                'nama_wilayah' => $this->request->getPost('nama_wilayah'),
                'warna' => $this->request->getPost('warna'),
                'geojson' => $this->request->getPost('geojson'),
            ];
            $this->ModelWilayah->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Wilayah');
        } else {
            //Jika Validasi Gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Wilayah/Tambah')->withInput('validations', \Config\Services::validation());
        }

        $this->ModelPengaturan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Wilayah Berhasil Ditambah !!!');
        return redirect()->to('Wilayah');
    }

    public function Delete($id_wilayah)
    {
        $data = [
            'id_wilayah' => $id_wilayah,
        ];
        $this->ModelWilayah->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Wilayah');
    }

    //kabupaten, kecamatan
    public function Kabupaten()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $kab = $this->ModelWilayah->allKabupaten($id_provinsi);
        echo ' <option value="">--Pilih Kabupaten---</option>';
        foreach ($kab as $key => $value) {
            echo '<option value=' . $value['id_kabupaten'] . '>' . $value['nama_kabupaten'] . '</option>';
        }
    }
    public function Kecamatan()
    {
        $id_kabupaten = $this->request->getPost('id_kabupaten');
        $kec = $this->ModelWilayah->allKecamatan($id_kabupaten);
        echo ' <option value="">--Pilih Kecamatan---</option>';
        foreach ($kec as $key => $value) {
            echo '<option value=' . $value['id_kecamatan'] . '>' . $value['nama_kecamatan'] . '</option>';
        }
    }
}
