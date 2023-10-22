<?php

namespace App\Controllers;

class Edit_profile extends BaseController
{
    public function index() {
        $data['errors'] = "";
        $model = model('App\Models\User_model');
        $session = session();
        $email = $session->get('email');
        $profile = $model->profile($email);
        $data['profile'] = $profile;
        echo view('template/header');       
        echo view ('edit_profile', $data);
        echo view('template/footer');
    }

    public function change_profile() {
        echo view('template/header');       
        echo view ('profile', $data);
        echo view('template/footer');
    }
}