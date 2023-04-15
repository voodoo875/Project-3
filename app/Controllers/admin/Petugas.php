<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Petugas extends BaseController
{
    protected $petugas;
    public function __construct()
    {
        $this->petugas = new AdminModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        if (session()->get('logged_in') == true) {
            $data['petugas'] = $this->petugas->findAll();
            return view('admin/petugas/index', $data);
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function add()
    {
        if (session()->get('logged_in') == true) {
            $data['petugas'] = $this->petugas->findAll();
            return view('admin/petugas/add');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function save()
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
            'uppassword' => 'required|matches[password]',

        ];

        $pesan = [
            'nama' => ['required' => 'Nama wisata tidak boleh kosong'],
            'email' => [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Format Email tidak sesuai',
            ],
            'password' => [
                'required' => 'Password tidak boleh kosong',
                'min_length' => 'Password tidak boleh kurang dari 8 Karakter'
            ],
            'uppassword' => [
                'required' => 'Password tidak boleh kosong',
                'matches' => 'Password harus sama seperti password baru'
            ],
        ];

        if (!$this->validate($rules, $pesan)) {
            $data['validation'] = $this->validator;
            return view('admin/petugas/add', $data);
        }

        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);

        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
        ];
        $this->petugas->save($data);

        return redirect()->to('admin/petugas');
    }

    public function update()
    {
        $id = $this->request->getVar('kode');
        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);

        if (empty($this->request->getVar('password'))) {
            $data = [
                'id_admin' => $id,
                'nama' => $nama,
                'email' => $email,
            ];
        } else {
            $data = [
                'id_admin' => $id,
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
            ];
        }

        $this->petugas->save($data);

        return redirect()->to('admin/petugas');
    }

    public function edit($id)
    {
        $data['cari'] = $this->petugas->where(['id_admin' => $id])->first();
        return view('admin/petugas/edit', $data);
    }


    public function delete($id)
    {
        $this->petugas->delete($id);
        return redirect()->to('admin/petugas');
    }
}
