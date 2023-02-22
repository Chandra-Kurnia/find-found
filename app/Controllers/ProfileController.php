<?php

namespace App\Controllers;

use App\Models\Users;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('pages/profile/index');
    }

    public function update()
    {
        $userModel = new Users();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);
        $session = session();

        if (!$this->validate([
            'username'      => 'required|is_unique[users.username,users.username,' . $user['username'] . ']',
            'name'          => 'required',
        ])) {
            $session->setFlashdata('err-update-profile', $this->validator->listErrors());
            return redirect()->to('/profile')->withInput();
        }

        $newData = [
            'role_id'       => $user['role_id'],
            'username'      => $this->request->getVar('username'),
            'password'      => $user['password'],
            'name'          => $this->request->getVar('name'),
            'profile_photo' => $user['profile_photo'],
        ];

        $session->set([
            'name'          => $this->request->getVar('name'),
            'username'      => $this->request->getVar('username')
        ]);

        $userModel->update($userId, $newData);

        return redirect()->to('/profile');
    }
}
