<?php

namespace App\Controllers;

use App\Models\Forums;
use App\Models\Categories;

class ForumsController extends BaseController
{
    public function index($param)
    {
        $forumModel = new Forums();
        $categoriesModel = new Categories();
        $existCategory = $categoriesModel->find($param);
        if(!$existCategory){
            return redirect()->to('/');
        }

        $forums = $forumModel->join('categories', 'forums.category_id = categories.category_id', 'left')->where('categories.category_id', $param)->findAll();
        
        $data = [
            'category'  => $existCategory,
            'forums'    => $forums
        ];

        return view('pages/forums/index', $data);
    }
    public function add()
    {
        return view('pages/forums/add-forum');
    }
    public function detail()
    {
        return view('pages/forums/detail-forum');
    }
}
