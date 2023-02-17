<?php

namespace App\Controllers;

use App\Models\Categories;
class DashboardController extends BaseController
{
    public function index()
    {
        $categoriesModel = new Categories();
        $data = [
            'categories' => $categoriesModel->findAll()
        ];
        return view('pages/dashboard/index', $data);
    }
}
