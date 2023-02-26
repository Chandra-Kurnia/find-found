<?php

namespace App\Controllers;

use App\Models\Forums;
use App\Models\Categories;
use App\Models\Status;
use App\Models\Photos;

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

        $forums = $forumModel->join('users', 'forums.user_id = users.user_id', 'left')->join('status', 'status.status_id = forums.status_id', 'left')->where('forums.category_id', $param)->findAll();

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
            ]
            // 'images'    => [
            //     'rules'     => 'required|max_size[gambar,10240]|max_files[gambar,6]',
            //     'errors'    => [
            //         'max_files'     => 'Jumlah file yang diunggah maksimum adalah 6 !',
            //         'max_size'      => 'Ukuran file yang diunggah maksimum 10MB !',
            //     ]
            // ]
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
        ];

        $forumModel->save($dataForum);

        $idForumInserted = $forumModel->getInsertID();

        $imagesRequest = $this->request->getFiles()['images'];
        $forumImage = array();
        foreach ($imagesRequest as $image) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/images/forum', $newName);
            array_push($forumImage,[
                'forum_id'  => $idForumInserted,
                'path'      => 'public/images/forum'.$newName
            ]);
        }
        
        $photosModel->insertBatch($forumImage);

        session()->setFlashdata('msg-add-forums', 'Sukses menambahkan forum baru!');
        return redirect()->to('/forums/'.$this->request->getVar('category'));
    }

    public function show()
    {
        return view('pages/forums/detail-forum');
    }
}
