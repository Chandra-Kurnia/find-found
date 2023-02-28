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
            session()->setFlashdata('err-add-forums', $this->validator->listErrors());
            return redirect()->to('/add-forum')->withInput();
        }

        $dataForum = [
            'category_id'   => $this->request->getVar('category'),
            'user_id'   => session()->get('user_id'),
            'status_id'   => $this->request->getVar('status'),
            'title'   => $this->request->getVar('title'),
            'description'   => $this->request->getVar('description'),
            'latitude'   => $this->request->getVar('latitude'),
            'longitude'   => $this->request->getVar('longitude')
        ];

        $forumModel->save($dataForum);

        $idForumInserted = $forumModel->getInsertID();

        $imagesRequest = $this->request->getFiles()['images'];
        $forumImage = array();
        foreach ($imagesRequest as $image) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/images/forum', $newName);
            array_push($forumImage, [
                'forum_id'  => $idForumInserted,
                'path'      => '/images/forum/' . $newName
            ]);
        }

        $photosModel->insertBatch($forumImage);

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

        $photos = $photosModel->where('forum_id', $param)->findAll();

        $comments = $commentsModel->join('users', 'users.user_id = comments.user_id')
            ->select('comments.*, users.profile_photo, users.username')
            ->where('forum_id', $param)->orderBy('created_at', 'desc')->findAll();

        $data = [
            'forum'     => $forum,
            'photos'    => $photos,
            'comments'  => $comments
        ];
        // dd($forum);
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
}
