<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function showRegister()
    {
        return view('frontend.auth.signup-vendor');
    }
}
