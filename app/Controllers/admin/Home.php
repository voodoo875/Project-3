<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == true) {
            return view('admin/home');
        } else {
            return redirect()->to('admin/login');
        }
    }
}
