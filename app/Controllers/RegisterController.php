<?php

namespace App\Controllers;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('pages/auth/register');
    }

    public function register()
    {
        if (!$this->validate([
            'name'      => 'required',
            'email'      => 'required|isEmail',
            'username'      => 'required',
            'password'      => 'required',
        ])) {
            session()->setFlashdata('err-auth', $this->validator->listErrors());
            return redirect()->to('/login')->withInput();
        }

        dd($this->request->getVar());
    }
}
