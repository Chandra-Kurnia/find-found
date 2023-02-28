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
        // dd($this->request->getFile('profile_photo'));
        $userModel = new Users();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);
        $session = session();

        $profile_photo = $user['profile_photo'];

        if (!$this->validate([
            'username'      => 'required|is_unique[users.username,users.username,' . $user['username'] . ']',
            'name'          => 'required',
        ])) {
            $session->setFlashdata('err-update-profile', $this->validator->listErrors());
            return redirect()->to('/profile')->withInput();
        }

        $file = $this->request->getFile('profile_photo');

        if ($file->isValid()) {
            if ($user['profile_photo'] != '/images/user.png') {
                unlink('.' . $user['profile_photo']);
            }
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/images/user-avatar', $newName);
            $profile_photo = '/images/user-avatar/' . $newName;
        }

        $newData = [
            'role_id'       => $user['role_id'],
            'username'      => $this->request->getVar('username'),
            'password'      => $user['password'],
            'name'          => $this->request->getVar('name'),
            'profile_photo' => $profile_photo,
        ];

        $session->set([
            'name'          => $this->request->getVar('name'),
            'username'      => $this->request->getVar('username'),
            'profile_photo' => $profile_photo
        ]);

        $userModel->update($userId, $newData);

        return redirect()->to('/profile');
    }
}
