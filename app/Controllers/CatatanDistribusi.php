<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use App\Models\ModelToko;
use App\Models\ModelCatatan;

class CatatanDistribusi extends BaseController
{
    public function __construct()
    {
        $this->ModelToko = new ModelToko();
        $this->ModelUser = new ModelUser();
        $this->ModelCatatan = new ModelCatatan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Catatan Distribusi',
            'menu' => 'catatan_distribusi',
            'isi' => 'catatanDistribusi/v_index',
            'toko' => $this->ModelToko->AllData(),
            'user' => $this->ModelUser->AllData(),
            'catatan' => $this->ModelCatatan->AllData(),
            'joinForAll' => $this->ModelCatatan->JoinForAll(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Tambah()
    {
        $data = [
            'judul' => 'Tambah Catatan Distribusi',
            'menu' => 'catatan_distribusi',
            'isi' => 'catatanDistribusi/v_tambah',
            'toko' => $this->ModelToko->AllData(),
            'user' => $this->ModelUser->AllData(),
            'catatan' => $this->ModelCatatan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'id_user' => [
                'label' => 'Pengguna Armada',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_toko' => [
                'label' => 'Nama Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            // 'waktu' => [
            //     'label' => 'Waktu',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Wajib Diisi !!!'
            //     ]
            // ],
            'jenis_galon' => [
                'label' => 'Jenis Galon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'jumlah_galon' => [
                'label' => 'Jumlah Galon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'status_pembayaran' => [
                'label' => 'Status Pembayaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
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
            $foto->move('assets/catatan', $nama_file_foto);

            //Jika Validasi Berhasil
            $data = [
                'id_user' => $this->request->getPost('id_user'),
                'id_toko' => $this->request->getPost('id_toko'),
                // 'waktu' => $this->request->getPost('waktu'),
                'jenis_galon' => $this->request->getPost('jenis_galon'),
                'jumlah_galon' => $this->request->getPost('jumlah_galon'),
                'status_pembayaran' => $this->request->getPost('status_pembayaran'),
                'foto' => $nama_file_foto,
            ];
            $this->ModelCatatan->InsertData($data);
            session()->setFlashdata('insert', 'Data Toko Berhasil Ditambahkan');
            return redirect()->to('CatatanDistribusi');
        } else {
            //Jika Validasi Gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('CatatanDistribusi/Tambah')->withInput('validation', \Config\Services::validation());
        }
    }
}
