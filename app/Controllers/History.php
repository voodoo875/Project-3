<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesanModel;

class History extends BaseController
{

    protected $pesan;

    public function __construct()
    {
        $this->pesan = new PesanModel();
    }

    public function index()
    {
        $data['pesan'] = $this->pesan
            ->join('wisata', 'wisata.id_wisata = pesan.id_wisata')
            ->where(['id' => session()->get('id_users'), 'status' => 'settlement'])->findAll();
        return view('history/index', $data);
    }
}
