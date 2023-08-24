<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class MenuAdmin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Menu Admin',
            'breadcrumb' => 'Menu Admin'
        ];

        return view('admin/pengguna', $data);
    }
}
