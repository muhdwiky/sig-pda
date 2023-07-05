<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelToko;
use App\Models\ModelWilayah;
use App\Models\ModelPengaturan;


class PetaLokasi extends BaseController
{
    public function __construct()
    {
        $this->ModelToko = new ModelToko();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPengaturan = new ModelPengaturan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Peta Lokasi',
            'menu' => 'peta_lokasi',
            'isi' => 'petaLokasi/v_index',
            'toko' => $this->ModelToko->AllData(),
            'joinForAll' => $this->ModelToko->JoinForAll(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'web' => $this->ModelPengaturan->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Tambah()
    {
        $data = [
            'judul' => 'Tambah Peta Lokasi Toko',
            'menu' => 'peta_lokasi',
            'isi' => 'petaLokasi/v_tambah',
            'web' => $this->ModelPengaturan->DataWeb(),
            'provinsi' => $this->ModelToko->allProvinsi(),
            'wilayah' => $this->ModelWilayah->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_toko' => [
                'label' => 'Nama Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'nama_pemilik' => [
                'label' => 'Nama Pemilik',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'no_telepon' => [
                'label' => 'No Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'alamat_toko' => [
                'label' => 'Alamat Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'koordinat_toko' => [
                'label' => 'Koordinat Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_wilayah' => [
                'label' => 'Wilayah Administrasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Toko',
                'rules' => 'max_size[foto,4096]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 4096 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],

        ])) {
            // Unggah Foto
            $foto = $this->request->getFile('foto');
            $nama_file_foto = $foto->getRandomName();
            $foto->move('assets/toko', $nama_file_foto);

            //Jika Validasi Berhasil
            $data = [
                'nama_toko' => $this->request->getPost('nama_toko'),
                'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                'no_telepon' => $this->request->getPost('no_telepon'),
                'id_provinsi' => $this->request->getPost('id_provinsi'),
                'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                'id_kecamatan' => $this->request->getPost('id_kecamatan'),
                'alamat_toko' => $this->request->getPost('alamat_toko'),
                'koordinat_toko' => $this->request->getPost('koordinat_toko'),
                'id_wilayah' => $this->request->getPost('id_wilayah'),
                'foto_toko' => $nama_file_foto,
            ];
            $this->ModelToko->InsertData($data);
            session()->setFlashdata('insert', 'Data Toko Berhasil Ditambahkan');
            return redirect()->to('PetaLokasi');
        } else {
            //Jika Validasi Gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('PetaLokasi/Tambah')->withInput('validation', \Config\Services::validation());
        }
    }

    public function Ubah($id_toko)
    {
        $data = [
            'judul' => 'Ubah Peta Lokasi Toko',
            'menu' => 'peta_lokasi',
            'isi' => 'petaLokasi/v_ubah',
            'web' => $this->ModelPengaturan->DataWeb(),
            'provinsi' => $this->ModelToko->allProvinsi(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'toko' => $this->ModelToko->DetailData($id_toko),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_toko)
    {
        if ($this->validate([
            'nama_toko' => [
                'label' => 'Nama Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'nama_pemilik' => [
                'label' => 'Nama Pemilik',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'no_telepon' => [
                'label' => 'No Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'alamat_toko' => [
                'label' => 'Alamat Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'koordinat_toko' => [
                'label' => 'Koordinat Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_wilayah' => [
                'label' => 'Wilayah Administrasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Toko',
                'rules' => 'max_size[foto,4096]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 4096 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],

        ])) {
            // Unggah Foto
            $toko = $this->ModelToko->DetailData($id_toko);
            $foto = $this->request->getFile('foto');
            $nama_file_foto = $foto->getRandomName();

            if ($foto->getError() == 4) {
                $nama_file_foto = $toko['foto'];
            } else {
                $nama_file_foto = $foto->getRandomName();
                $foto->move('assets/toko', $nama_file_foto);
            }

            //Jika Validasi Berhasil
            $data = [
                'id_toko' => $id_toko,
                'nama_toko' => $this->request->getPost('nama_toko'),
                'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                'no_telepon' => $this->request->getPost('no_telepon'),
                'id_provinsi' => $this->request->getPost('id_provinsi'),
                'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                'id_kecamatan' => $this->request->getPost('id_kecamatan'),
                'alamat_toko' => $this->request->getPost('alamat_toko'),
                'koordinat_toko' => $this->request->getPost('koordinat_toko'),
                'id_wilayah' => $this->request->getPost('id_wilayah'),
                'foto_toko' => $nama_file_foto,
            ];

            $this->ModelToko->UpdateData($data);
            session()->setFlashdata('insert', 'Data Toko Berhasil Diubah');
            return redirect()->to('PetaLokasi');
        } else {
            //Jika Validasi Gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('PetaLokasi/Ubah/' . $id_toko)->withInput('validation', \Config\Services::validation());
        }
    }

    public function Detail($id_toko)
    {
        $data = [
            'judul' => 'Detail Peta Lokasi Toko',
            'menu' => 'peta_lokasi',
            'isi' => 'petaLokasi/v_detail',
            'web' => $this->ModelPengaturan->DataWeb(),
            'toko' => $this->ModelToko->DetailData($id_toko),
        ];
        return view('v_template_back_end', $data);
    }

    //Hapus Data Toko
    public function Delete($id_toko)
    {
        $toko = $this->ModelToko->DetailData($id_toko);
        if ($toko['foto_toko'] <> '') {
            unlink('assets/toko/' . $toko['foto_toko']);
        }
        $data = [
            'id_toko' => $id_toko,
        ];
        $this->ModelToko->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('PetaLokasi');
    }

    //Menampilkan Data Kabupaten
    public function Kabupaten()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $kab = $this->ModelToko->allKabupaten($id_provinsi);
        echo '<option value="">--Pilih Kabupaten--</option>';
        foreach ($kab as $key => $value) {
            echo '<option value=' . $value['id_kabupaten'] . '>' . $value['nama_kabupaten'] . '</option>';
        }
    }

    //Menampilkan Data Kecamatan
    public function Kecamatan()
    {
        $id_kabupaten = $this->request->getPost('id_kabupaten');
        $kec = $this->ModelToko->allKecamatan($id_kabupaten);
        echo '<option value="">--Pilih Kecamatan--</option>';
        foreach ($kec as $key => $value) {
            echo '<option value=' . $value['id_kecamatan'] . '>' . $value['nama_kecamatan'] . '</option>';
        }
    }
}
