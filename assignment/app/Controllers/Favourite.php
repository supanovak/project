<?php

namespace App\Controllers;

class Favourite extends BaseController
{
    public function index() {
        $data['errors'] = "";
        $model = model('App\Models\User_model');
        $session = session();
        $email = $session->get('email');
        $profile = $model->profile($email);
        $user_favourites = $model->yourFavourites($email);
        //print_r($user_favourites);
        $data['user_favourites'] = $user_favourites;
        echo view('template/header');       
        echo view ('favourite', $data);
        echo view('template/footer');
    }
}
