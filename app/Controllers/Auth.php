<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth;
    }

    public function Login()
    {
        $data = [
            'judul' => 'Login',
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi dan Tidak Boleh Kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi dan Tidak Boleh Kosong'
                ]
            ],

        ])) {
            // Jika Login
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $CekLogin = $this->ModelAuth->Login($email, $password);
            if ($CekLogin) {
                #Jika Login Berhasil
                session()->set('log', true);
                session()->set('username', $CekLogin['username']);
                session()->set('email', $CekLogin['email']);
                session()->set('id_role', $CekLogin['id_role']);
                session()->set('foto', $CekLogin['foto']);
                return redirect()->to('Admin');
            } else {
                #Jika Login Gagal
                session()->setFlashdata('pesan', 'Gagal Masuk, Email atau Password Salah');
                return redirect()->to('Auth/Login');
            }
        } else {
            //Jika Validasi Gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Auth/Login')->withInput('validation', \Config\Services::validation());
        }
    }
}
