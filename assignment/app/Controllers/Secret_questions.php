<?php

namespace App\Controllers;

class Secret_questions extends BaseController
{
    public function index() {
        $data['error'] = "";
        echo view('template/header');
        echo view('secret_questions', $data);
        echo view('template/footer');
    }

    public function submit_questions() {
        $data['error'] = "";
        $model = model('App\Models\User_model');
        $session = session();
        $email = $session->get('email');
        $user = $model->profile($email);
        foreach($user as $row) {
            extract($row);
        }
        $first_question = $_POST['first_q'];
        $second_question = $_POST['second_q'];
        $third_question = $_POST['third_q'];
        $first_answer = $this->request->getPost('first_a');
        $second_answer = $this->request->getPost('second_a');
        $third_answer = $this->request->getPost('third_a');
        $question_array = array($first_question=>$first_answer, $second_question=>$second_answer, $third_question=>$third_answer);
        foreach($question_array as $question=>$answer) {
            $question_details = [
                'user' => $id,
                'question' => $question,
                'question_answer' =>$answer,
            ];
            $check = $model->handle_secret_questions($question_details);
        }
        if ($check) {
            //Prepare home page
            $model = model('App\Models\Home_model');
            $popular = $model->getPopular();
            $recent = $model->getRecent();
            $data['popular'] = $popular;
            $data['recent'] = $recent;
            echo view("template/header");
            echo view("home", $data);
            echo view("template/footer");
        } else {
            $data['error'] = "Something went wrong";
            echo view('template/header');
            echo view('secret_questions', $data);
            echo view('template/footer');
        }
    }

}