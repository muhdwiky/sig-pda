<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class DaftarPengguna extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'Daftar Pengguna',
            'menu' => 'daftar_pengguna',
            'isi' => 'daftarPengguna/v_index',
            'user' => $this->ModelUser->AllData(),
            'joinUserRole' => $this->ModelUser->JoinUserRole(),
            'role' => $this->ModelUser->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Tambah()
    {
        $data = [
            'judul' => 'Tambah Pengguna',
            'menu' => 'daftar_pengguna',
            'isi' => 'daftarPengguna/v_tambah',
            'role' => $this->ModelUser->allRole(),
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Nama Pengguna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_role' => [
                'label' => 'Role',
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
            $foto->move('assets/user', $nama_file_foto);

            //Jika Validasi Berhasil
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => sha1($this->request->getPost('password')),
                'id_role' => $this->request->getPost('id_role'),
                'foto' => $nama_file_foto,
            ];
            $this->ModelUser->InsertData($data);
            session()->setFlashdata('insert', 'Data Toko Berhasil Ditambahkan');
            return redirect()->to('DaftarPengguna');
        } else {
            //Jika Validasi Gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('DaftarPengguna/Tambah')->withInput('validation', \Config\Services::validation());
        }
    }

    public function Ubah($id_user)
    {
        $data = [
            'judul' => 'Ubah Daftar Pengguna',
            'menu' => 'daftar_pengguna',
            'isi' => 'daftarPengguna/v_ubah',
            'role' => $this->ModelUser->allRole(),
            'user' => $this->ModelUser->DetailData($id_user),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_user)
    {
        if ($this->validate([
            'username' => [
                'label' => 'Nama Pengguna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'id_role' => [
                'label' => 'Role',
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
            $user = $this->ModelUser->DetailData($id_user);
            $foto = $this->request->getFile('foto');
            $nama_file_foto = $foto->getRandomName();

            if ($foto->getError() == 4) {
                $nama_file_foto = $user['foto'];
            } else {
                $nama_file_foto = $foto->getRandomName();
                $foto->move('assets/user', $nama_file_foto);
            }

            //Jika Validasi Berhasil
            $data = [
                'id_user' => $id_user,
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => sha1($this->request->getPost('password')),
                'id_role' => $this->request->getPost('id_role'),
                'foto' => $nama_file_foto,
            ];

            $this->ModelUser->UpdateData($data);
            session()->setFlashdata('insert', 'Data Pengguna Berhasil Diubah');
            return redirect()->to('DaftarPengguna');
        } else {
            //Jika Validasi Gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('DaftarPengguna/Ubah/' . $id_user)->withInput('validation', \Config\Services::validation());
        }
    }

    public function Detail($id_user)
    {
        $data = [
            'judul' => 'Detail Pengguna',
            'menu' => 'daftar_pengguna',
            'isi' => 'daftarPengguna/v_detail',
            'user' => $this->ModelUser->DetailData($id_user),
        ];
        return view('v_template_back_end', $data);
    }

    public function Delete($id_user)
    {
        $user = $this->ModelUser->DetailData($id_user);
        if ($user['foto'] <> '') {
            unlink('assets/user/' . $user['foto']);
        }
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('DaftarPengguna');
    }
}
