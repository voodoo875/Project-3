<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Controllers\BaseController;

class Login extends BaseController
{

    protected $login;
    public function __construct()
    {
        $this->login = new AdminModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        return view('admin/login/index');
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
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataLogin = $this->login->where(['email' => $email])->first();
        if ($dataLogin) {
            if (password_verify($password, $dataLogin->password)) {
                session()->set([
                    'id_admin' => $dataLogin->id_admin,
                    'logged_in' => true,
                    'nama' => $dataLogin->nama,
                ]);
                return redirect()->to('admin/home');
            } else {
                session()->setFlashdata('error', 'PASSWORD SALAH!');
                return redirect()->to('admin/login');
            }
        } else {
            session()->setFlashdata('error', 'EMAIL TIDAK DIKENAL!');
            return redirect()->to('admin/login');
        }
    }

    public function keluar()
    {
        session()->destroy();
        return redirect()->to('admin');
    }
}
