<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('pages/profile/index');
    }
}
