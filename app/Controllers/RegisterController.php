<?php

namespace App\Controllers;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('pages/auth/register');
    }
}
