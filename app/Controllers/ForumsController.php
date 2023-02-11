<?php

namespace App\Controllers;

class ForumsController extends BaseController
{
    public function index()
    {
        return view('pages/forums/index');
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
