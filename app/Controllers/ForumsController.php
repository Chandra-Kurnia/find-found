<?php

namespace App\Controllers;

use App\Models\Forums;
use App\Models\Categories;
use App\Models\Status;
use App\Models\Photos;
use App\Models\Comments;

class ForumsController extends BaseController
{
    public function index($param)
    {
        $forumModel = new Forums();
        $categoriesModel = new Categories();
        $existCategory = $categoriesModel->find($param);
        if (!$existCategory) {
            return redirect()->to('/');
        }

        $forums = $forumModel->join('users', 'forums.user_id = users.user_id', 'left')
            ->join('status', 'status.status_id = forums.status_id', 'left')
            ->join('categories', 'forums.category_id = categories.category_id')
            ->where('flag_active', '1')
            ->where('forums.category_id', $param)
            ->select('forums.*, status.status_name, users.username, categories.photo')
            ->findAll();

        // dd($forums);
        $data = [
            'category'  => $existCategory,
            'forums'    => $forums
        ];

        return view('pages/forums/index', $data);
    }

    public function create()
    {
        $categoriesModel = new Categories();
        $statusModel = new Status();
        $data = [
            'categories'    => $categoriesModel->findAll(),
            'statuses'      => $statusModel->whereNotIn('status_name', ['Ditutup'])->findAll()
        ];

        return view('pages/forums/add-forum', $data);
    }

    public function store()
    {
        $forumModel = new Forums();
        $photosModel = new Photos();

        $rules = [
            'status'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Label harus diisi !'
                ]
            ],
            'category'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Kategori harus diisi !'
                ]
            ],
            'title'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Nama Forum harus diisi !'
                ]
            ],
            'description'     => [
                'rules'     => 'required|max_length[200]',
                'errors'    => [
                    'required'      => 'Nama Forum harus diisi !',
                    'max_length'    => 'Maksimal deskripsi 200 karakter !'
                ]
            ],
            'forum_cover'   => [
                'rules'     => 'uploaded[forum_cover]|mime_in[forum_cover,image/jpg,image/jpeg,image/png]|max_size[forum_cover,5120]',
                'errors'    => [
                    'uploaded'      => 'Anda harus meng upload cover forum !',
                    'mime_in'       => 'Gambar harus memiliki tipe .png, .jpg, atau .jpeg !',
                    'max_size'      => 'Ukuran gambar maksimal adalah 5mb !'
                ]
            ],
            'latitude'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Latitude harus diisi !'
                ]
            ],
            'longitude'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Longitude harus diisi !'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('err-add-forums', $this->validator->listErrors());
            return redirect()->to('/add-forum')->withInput();
        }

        $image_request = $this->request->getFile('forum_cover');
        $new_name = $image_request->getRandomName();
        $image_request->move(ROOTPATH . 'public/images/forum/forum_cover', $new_name);

        $dataForum = [
            'category_id'   => $this->request->getVar('category'),
            'user_id'   => session()->get('user_id'),
            'status_id'   => $this->request->getVar('status'),
            'title'   => $this->request->getVar('title'),
            'description'   => $this->request->getVar('description'),
            'forum_cover'   => '/images/forum/forum_cover/' . $new_name,
            'latitude'   => $this->request->getVar('latitude'),
            'longitude'   => $this->request->getVar('longitude')
        ];

        $forumModel->save($dataForum);

        // $idForumInserted = $forumModel->getInsertID();

        // $imagesRequest = $this->request->getFiles()['images'];
        // $forumImage = array();
        // foreach ($imagesRequest as $image) {
        //     $newName = $image->getRandomName();
        //     $image->move(ROOTPATH . 'public/images/forum', $newName);
        //     array_push($forumImage, [
        //         'forum_id'  => $idForumInserted,
        //         'path'      => '/images/forum/' . $newName
        //     ]);
        // }

        // $photosModel->insertBatch($forumImage);

        session()->setFlashdata('msg-update-forums', 'Sukses Update forum!');
        return redirect()->to('/forums/' . $this->request->getVar('category'));
    }

    public function show($param)
    {
        $forumModel = new Forums();
        $photosModel = new Photos();
        $commentsModel = new Comments();

        $forum = $forumModel->join('users', 'forums.user_id = users.user_id', 'left')
            ->join('status', 'status.status_id = forums.status_id')
            ->where('forum_id', $param)
            ->select('forums.*, users.username, status.status_name')->first();

        if (!$forum) {
            return redirect()->to('/');
        }

        $photos = $photosModel->where('forum_id', $param)->findAll();

        $comments = $commentsModel->join('users', 'users.user_id = comments.user_id')
            ->select('comments.*, users.profile_photo, users.username')
            ->where('forum_id', $param)->orderBy('created_at', 'desc')->findAll();

        $data = [
            'forum'     => $forum,
            'photos'    => $photos,
            'comments'  => $comments
        ];
        return view('pages/forums/detail-forum', $data);
    }

    public function edit($param)
    {
        // dd($param);
        $categoriesModel = new Categories();
        $statusModel = new Status();
        $forumModel = new Forums();
        $photosModel = new Photos();

        $photos = $photosModel->where('forum_id', $param)->findAll();

        $forum = $forumModel->where('forum_id', $param)->where('flag_active', '1')->first();
        if (!$forum) {
            return redirect()->to('/');
        }

        $data = [
            'categories'    => $categoriesModel->findAll(),
            'statuses'      => $statusModel->whereNotIn('status_name', ['Ditutup'])->findAll(),
            'forum'         => $forum,
            'photos'        => $photos
        ];

        return view('pages/forums/edit-forum', $data);
    }

    public function update($param)
    {
        // dd($this->request->getVar());
        $forumModel = new Forums();
        $photosModel = new Photos();

        $rules = [
            'status'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Label harus diisi !'
                ]
            ],
            'category'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Kategori harus diisi !'
                ]
            ],
            'title'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Nama Forum harus diisi !'
                ]
            ],
            'description'     => [
                'rules'     => 'required|max_length[200]',
                'errors'    => [
                    'required'      => 'Nama Forum harus diisi !',
                    'max_length'    => 'Maksimal deskripsi 200 karakter !'
                ]
            ],
            'latitude'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Latitude harus diisi !'
                ]
            ],
            'longitude'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Longitude harus diisi !'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('err-update-forums', $this->validator->listErrors());
            return redirect()->to('/edit-forum/' . $param)->withInput();
        }

        $forum = $forumModel->where('forum_id', $param)->first();

        $dataForum = [
            'category_id'   => $this->request->getVar('category'),
            'user_id'   => $forum['user_id'],
            'status_id'   => $this->request->getVar('status'),
            'title'   => $this->request->getVar('title'),
            'description'   => $this->request->getVar('description'),
            'latitude'   => $this->request->getVar('latitude'),
            'longitude'   => $this->request->getVar('longitude')
        ];

        $forumModel->update($param, $dataForum);

        $file = $this->request->getFiles()['images'];
        if ($file[0]->isValid()) {
            // Delete all file
            $oldFiles = $photosModel->where('forum_id', $param)->findAll();
            foreach ($oldFiles as $oldFile) {
                unlink('.' . $oldFile['path']);
                $photosModel->delete($oldFile['photo_id']);
            }

            // Insert new file
            $forumImage = array();
            foreach ($file as $image) {
                $newName = $image->getRandomName();
                $image->move(ROOTPATH . 'public/images/forum', $newName);
                array_push($forumImage, [
                    'forum_id'  => $forum['forum_id'],
                    'path'      => '/images/forum/' . $newName
                ]);
            }
            $photosModel->insertBatch($forumImage);
        }

        session()->setFlashdata('msg-add-forums', 'Sukses menambahkan forum baru!');
        return redirect()->to('/forums/' . $this->request->getVar('category'));
    }

    public function close_forum($param)
    {
        $forumModel = new Forums();
        $forumModel->set('status_id', '3')->where('forum_id', $param)->update();

        return redirect()->to('/');
    }

    public function delete_forum($param)
    {
        $forumModel = new Forums();
        $forumModel->set('flag_active', '0')->where('forum_id', $param)->update();

        return redirect()->to('/');
    }

    public function upload_image()
    {
        $photosModel = new Photos();

        $image = $this->request->getFile('file');
        $forum_id = $this->request->getVar('forum_id');
        $newName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/images/forum', $newName);

        $data = [
            'forum_id'  => $forum_id,
            'path'      => '/images/forum/' . $newName
        ];

        $photosModel->save($data);

        $idImageInserted = $photosModel->getInsertID();
        $responseData = [
            'forum_id'  => $forum_id,
            'path'      => '/images/forum/' . $newName,
            'idImage'  => $idImageInserted
        ];

        return $this->response->setStatusCode(201)->setJSON($responseData);
    }
}
