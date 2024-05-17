<?php

namespace App\Controllers\Member;

use App\Controllers\MasterController;

class HomeController extends MasterController
{
    public function index()
    {
        return view('fe/loginRev');
    }
    // public function index()
    // {
    //     return view('fe/login');
    // }

    public function dashboard()
    {
        return view('fe/home');
    }
}
