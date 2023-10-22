<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $model = model('App\Models\Home_model');
        $popular = $model->getPopular();
        $recent = $model->getRecent();
        $data['errors'] = "";
        $data['popular'] = $popular;
        $data['recent'] = $recent;
        echo view('template/header');
        echo view('home', $data);
        echo view('template/footer');
    }

}
