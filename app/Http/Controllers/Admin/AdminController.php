<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Front\Admin\ProductAdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use ProductAdminRepository;

        //The [show_product ] is inside the ProductAdminRepository : The desired method is written as a trait

    public function home(){
        return view('Admin.Pages.IndexPage');
    }
}
