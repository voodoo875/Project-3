<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    public function cek()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]'
        ];

        $pesan = [
            'email' => [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Format Email tidak sesuai',
            ],
            'password' => [
                'required' => 'Password tidak boleh kosong',
                'min_lenght' => 'Password tidak boleh kurang dari 8 karakter'
            ],
        ];

        if (!$this->validate($rules, $pesan)) {
            $data['validation'] = $this->validator;
            return view('admin/login/index', $data);
        }
    }
}
