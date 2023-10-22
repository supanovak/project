<?php
namespace App\Controllers;
class Post extends BaseController
{
	public function index() {
        $data['errors'] = "";
        echo view('template/header');
        echo view('post', $data);
        echo view('template/footer');
    }

    public function post_question() {
        $data['error'] = "";
        $session = session();
        $email = $session->get('email');
        $model = model('App\Models\User_model');
        $array = $model->profile($email);
        foreach ($array as $row) {
            extract($row);
        }
        $model = model('App\Models\Post_model');
        $title = $this->request->getPost('title');
        $post_id = $model->getPostID();
        foreach ($post_id as $row) {
            $new_post_id = $row['pid'] + 1;
        }
        $tag = $_POST['tag'];
        $content = $this->request->getPost('content');
        $post_details = [
            'pid' => $new_post_id,
            'title' => $title,
            'user' => $id,
            'tag' => $tag,
            'content' => $content,
        ];
        $check = $model->postQuestion($post_details);
        if ($check) {
            echo view('template/header');
            echo "<script type='text/javascript'>alert('Question successfully posted');</script>";
            echo view('post', $data);
            echo view('template/footer');
        } else {
            echo view('template/header');
            echo "<script type='text/javascript'>alert('Error posting question');</script>";
            echo view('post', $data);
            echo view('template/footer');
        }
        // echo view('template/header');
        // echo view('post', $data);

    }
}