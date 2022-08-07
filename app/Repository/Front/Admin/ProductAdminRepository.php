<?php

namespace App\Repository\Front\Admin;

trait ProductAdminRepository{

    public function show_product()
    {
        return view('Admin.Pages.Product');
    }

}