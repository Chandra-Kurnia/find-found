<?php

namespace App\Controllers;

class ForumsController extends BaseController
{
    public function index($param)
    {
        $data = [];

        $category = array('elektronik', 'dompet', 'totebag', 'lain');
        if(in_array($param, $category)){
            // (dd($param));
            return view('pages/forums/index');
        }else{
            return redirect()->to('/');
        }

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
