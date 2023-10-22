<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index() {
        $data['errors'] = "";
        $model = model('App\Models\User_model');
        $session = session();
        $email = $session->get('email');
        $profile = $model->profile($email);
        $data['profile'] = $profile;
        $user_posts = $model->yourPosts($email);
        $data['user_posts'] = $user_posts;
        echo view('template/header');       
        echo view ('profile', $data);
        echo view('template/footer');
    }
    
    
    // public function edit_profile() {
    //     $data = [
    //         'id' => $profile['id'],
    //         'first_name' => $profile['first_name'],
    //         'last_name' => $profile['last_name'],
    //         'email' => $profile['email'],
    //     ];
    //     $changed_profile = $model->changeProfile($data);
    //     echo view('template/header');
    //     echo view('profile', $data);
    //     echo view('template/footer');
    // }
}
?>