<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesanModel;
use App\Models\WisataModel;

class Wisata extends BaseController
{
    protected $wisata;
    protected $pesan;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->wisata = new WisataModel();
        $this->pesan = new PesanModel();
    }

    public function index()
    {
        $data['wisata'] = $this->wisata->findAll();
        return view('wisata/index', $data);
    }

    public function pesan($id)
    {
        if (session()->get('logged_in') == TRUE) {
            $data['wisata'] = $this->wisata->where(['id_wisata' => $id])->first();
            return view('wisata/pesan', $data);
        } else {
            return redirect()->to('login');
        }
    }

    public function proses()
    {
        $harga = $this->request->getVar('harga');
        $id = $this->request->getVar('id');

        $rules = [
            'anak' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Field Harus diisi',
                    'numeric' => 'Gunakan angka!'
                ],
            ],
            'dewasa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Field Harus diisi',
                    'numeric' => 'Gunakan angka!'
                ],
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus dipilih',
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            $data['wisata'] = $this->wisata->where(['id_wisata' => $id])->first();
            $data['validation'] = $this->validator->getErrors();
            return view('wisata/pesan', $data);
        }

        $anak = $this->request->getVar('anak');
        $dewasa = $this->request->getVar('dewasa');
        $tanggal = $this->request->getVar('tanggal');

        $hAnak = $anak * ($harga / 2);
        $hDewasa =  $dewasa * $harga;
        $total = $hAnak + $hDewasa;

        \Midtrans\Config::$serverKey = 'SB-Mid-server-YBqQm7EU81Mj1zeehWhHeFdC';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $id_pesan = time();

        $nama = session()->get('nama');
        $email = session()->get('email');

        $params = array(
            'transaction_details' => array(
                'order_id' => $id_pesan,
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => $nama,
                'last_name' => '',
                'email' => $email,
                'phone' => '',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data = [
            'id_pesan' => $id_pesan,
            'id' => session()->get('id_users'),
            'id_wisata' => $id,
            'qty_anak' => $anak,
            'qty_dewasa' => $dewasa,
            'total' => $total,
            'tgl_datang' => $tanggal,
            'snap' => $snapToken,
        ];
        $this->pesan->save($data);

        session()->setFlashdata('success', 'Tiket Berhasil Dipesan');
        return redirect()->to('wisata/bayar');
    }

    public function bayar()
    {
        $data['pesan'] = $this->pesan->join('wisata', 'wisata.id_wisata = pesan.id_wisata')->where(['id' => session()->get('id_users')])->findAll();
        return view('wisata/bayar', $data);
    }
}
