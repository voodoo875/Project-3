<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Login extends BaseController
{
    protected $users;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->users = new UserModel();
    }

    public function index()
    {
        return view('login/index');
    }

    public function register()
    {
        return view('register/index');
    }

    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama  tidak boleh kosong'],
            ],
            'kelamin' => [
                'rules' => 'required',
                'errors' => ['required' => 'Jenis Kelamin harus dipilih'],
            ],
            'telepon' => [
                'rules' => 'required|min_length[10]|max_length[12]',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi!',
                    'min_length' => 'Nomor telepon tidak valid!',
                    'max_length' => 'Nomor telepon tidak valid!',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Format Email tidak Valid!'
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Harus Diisi!',
                    'min_length' => 'Password harus 8 Karakter atau lebih'
                ],
            ]
        ];


        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator->getErrors();
            return view('register/index', $data);
        }

        //menampung isi dari variabel index.php di dalam register
        $nama = $this->request->getVar('nama');
        $kelamin = $this->request->getVar('kelamin');
        $telepon = $this->request->getVar('telepon');
        $email = $this->request->getVar('email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);

        $data = [
            'id' => time(),
            'nama_users' => $nama,
            'kelamin' => $kelamin,
            'ponsel' => $telepon,
            'email' => $email,
            'password' => $password,
        ];

        //melempar isi variabel ke dalam databse
        $this->users->save($data);
        session()->setFlashdata('success', 'Akun berhasil dibuat, silahkan login');
        return redirect()->to('login');
    }

    public function proses()
    {
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Format Email tidak Valid!'
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Harus Diisi!',
                    'min_length' => 'Password harus 8 Karakter atau lebih'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator->getErrors();
            return view('login/index', $data);
        }
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $login = $this->users->where(['email' => $email])->first();
        if ($login) {
            if (password_verify($password, $login->password)) {
                session()->set([
                    'id_users' => $login->id,
                    'nama' => $login->nama_users,
                    'email' => $login->email,
                    'logged_in' => true
                ]);
                return redirect()->to('');
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->to('login');
            };
        } else {
            session()->setFlashdata('error', 'Email tidak ditemukan');
            return redirect()->to('login');
        }
    }

    public function keluar()
    {
        session()->destroy();
        return redirect()->to('');
    }
}
