<?php

namespace App\Controllers;

use App\Models\Users;

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

        $userModel = new Users();

        $user = $userModel->where('username', $username)->join('roles', 'roles.role_id = users.role_id', 'left')->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set([
                    'user_id'       => $user['user_id'],
                    'role_id'       => $user['role_id'],
                    'name'          => $user['name'],
                    'username'      => $user['username'],
                    'profile_photo' => $user['profile_photo'],
                    'IS_LOGIN' => true
                ]);
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
