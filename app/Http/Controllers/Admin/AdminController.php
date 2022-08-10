<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Front\Admin\AdminRepository;
use App\Repository\Front\Admin\ProductAdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use AdminRepository , ProductAdminRepository;

        //The [show_product  , search_product , show_data , delete_data ] is inside the AdminRepository : The desired method is written as a trait
        //The [ delete_image_product ] is inside the ProductAdminRepository : The desired method is written as a trait

    public function home(){
        return view('Admin.Pages.IndexPage');
    }
}
