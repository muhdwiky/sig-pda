<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // $data = [
        //     'judul' => 'Home',
        //     'isi' => 'v_home',
        // ];

        // return view('v_template_back_end', $data);
        return view('v_login');
    }
}
