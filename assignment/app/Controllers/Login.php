<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index() {
        $data['error']= "";
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            echo view('template/header');
            echo view("welcome_message");
            echo view('template/footer');
        } else {
            $session = session();
            $email = $session->get('email');
            $password = $session->get('password');
            if ($email && $password) {
                echo view('template/header');
                echo view("home", $data);
                echo view('template/footer');
            } else {
                echo view('template/header');
                echo view('login', $data);
                echo view('template/footer');
            }
        }
    }

    public function check_login() {
        $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        $email = $this->request->getPost('email');
        $check_password = $this->request->getPost('password');
        $model = model('App\Models\User_model');
        $check = $model->login($email);
        foreach($check as $row) {
            extract($row);
        }
        password_verify($check_password, $password);
        $if_remember = $this->request->getPost('remember');
        $user = $model->profile($email);
        if ($check) {
            // Prepare home page
            $model = model('App\Models\Home_model');
            $popular = $model->getPopular();
            $recent = $model->getRecent();
            $data['popular'] = $popular;
            $data['recent'] = $recent;
            // Create a session 
            $session = session();
            $session->set('email', $email);
            $session->set('password', $password);
            $session->set('array3', $user);
            // Create and store cookie for 30 days if user clicks remember me
            if ($if_remember) {
                setcookie('email', $email, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            }
            // Redirect to 'home' page
            echo view("template/header");
            echo view("home", $data);
            echo view("template/footer");
        } else {
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
        }
    }

    public function logout() {
        helper('cookie');
        $session = session();
        $session->destroy();
        setcookie('email', '', time() - 3600, "/");
        setcookie('password', '', time() - 3600, "/");
        return redirect()->to(base_url('login'));
    }
}