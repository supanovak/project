<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index() {
        $data['error'] = "";
        echo view('template/header');
        echo view('register', $data);
        echo view('template/footer');
    }

    public function check_register() {
        $data['error'] = "";
        $first_name = $this->request->getPost('first');
        $last_name = $this->request->getPost('last');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $if_remember = $this->request->getPost('remember');
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\">Invalid email format </div>";
            echo view('template/header');
            echo view('register', $data);
            echo view('template/footer');
        } else {
            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>";
                echo view('template/header');
                echo view('register', $data);
                echo view('template/footer');
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $register_details = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => $hashed_password, 
                ];
                $model = model('App\Models\User_model');
                $check = $model->check_register($email);
                if ($check) {
                    //Save user details in database
                    $reg = $model->register($register_details);
                   
                    // Create a session 
                    $session = session();
                    $session->set('email', $email);
                    $session->set('password', $password);
                    // Create and store cookie for 30 days if user clicks remember me
                    if ($if_remember) {
                        setcookie('email', $email, time() + (86400 * 30), "/");
                        setcookie('password', $password, time() + (86400 * 30), "/");
                    }
                    // Redirect to 'ecret questions page
                    echo view("template/header");
                    echo view("secret_questions", $data);
                    echo view("template/footer");
                } else {
                    $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Account already exists </div>";
                    echo view('template/header');
                    echo view('register', $data);
                    echo view('template/footer');
                }
            }
        }
    }
}