<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RiwayatAbsensi extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Riwayat Absensi',
            'menu' => 'riwayat_absensi',
            'isi' => 'riwayatAbsensi/v_index',
        ];
        return view('v_template_back_end', $data);
    }
}
