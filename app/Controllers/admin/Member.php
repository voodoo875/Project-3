<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Member extends BaseController
{
    protected $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->users->findAll();
        return view('admin/users/index', $data);
    }
}
