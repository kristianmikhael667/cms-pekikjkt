<?php

namespace App\Controllers\Admin\Role;

use App\Controllers\Base\BaseController;
use Config\Services;

class Role extends BaseController
{
    public function index()
    {
        return view('roles/index');
    }
    public function merchant()
    {
        return view('roles/merchant');
    }
    public function dki()
    {
        return view('roles/dki');
    }
    public function admin()
    {
        return view('roles/admin');
    }
}
