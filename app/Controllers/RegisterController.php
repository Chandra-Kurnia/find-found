<?php

namespace App\Controllers;

use App\Models\Users;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('pages/auth/register');
    }

    public function register()
    {
        if (!$this->validate([
            'name'          => 'required|is_unique[users.name]',
            'username'      => 'required|is_unique[users.username]',
            'password'      => 'required',
        ])) {
            session()->setFlashdata('err-auth', $this->validator->listErrors());
            return redirect()->to('/login')->withInput();
        }

        $data = [
            'name'          => $this->request->getVar('name'),
            'username'      => $this->request->getVar('username'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role_id'       => 2
        ];

        $userModel = new Users();
        $userModel->save($data);

        return redirect()->to('/login');
    }
}
