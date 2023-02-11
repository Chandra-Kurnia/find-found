<?php

namespace App\Controllers;

class ForumsController extends BaseController
{
    public function index($param)
    {
        $data = [];

        $category = array('elektronik', 'dompet', 'totebag', 'lain');
        if(in_array($param, $category)){
            (dd($param));
        }else{
            return redirect()->to('/');
        }

        return view('pages/forums/index');
    }
    public function add()
    {
        return view('pages/forums/add-forum');
    }
}
