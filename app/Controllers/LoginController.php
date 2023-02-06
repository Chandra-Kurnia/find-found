<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [];
        return view('pages/auth/login', $data);
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if (!$this->validate([
            'username'      => 'required',
            'password'      => 'required',
        ])) {
            session()->setFlashdata('err-auth', $this->validator->listErrors());
            return redirect()->to('/login')->withInput();
        }

        if ($username == 'user') {
            if ($password == 'pass') {
                return redirect()->to('/');
            } else {
                session()->setFlashdata('err-auth', 'Wrong Password!');
                return redirect()->to('/login')->withInput();
            }
        } else {
            session()->setFlashdata('err-auth', 'Username Not Found!');
            return redirect()->to('/login')->withInput();
        }
    }
}