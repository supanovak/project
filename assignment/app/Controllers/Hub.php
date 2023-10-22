<?php
namespace App\Controllers;
class Hub extends BaseController
{
	public function index() {
        $data['error']= "";
        $model = model('App\Models\Hub_model');
        $posts = $model->getPosts();
        $data['errors'] = "";
        $data['posts'] = $posts;
        echo view('template/header');
        echo view('hub', $data);
        echo view('template/footer');
    }

    public function show_filtered() {
        $data['error']= "";
        $model = model('App\Models\Hub_model');
        $title = $this->request->getPost('title');
        $author = $this->request->getPost('author');
        $tag = $_POST['tag'];
        // echo empty($title) ? "title: empty " : $title;
        // echo empty($tag) ? "tag: empty " : $tag;
        // echo empty($author) ? "author: empty " : $author;
        if (empty($title) && empty($tag) && empty($author)) {
            $posts = $model->getPosts();
            //print_r ($posts);
            $data['posts'] = $posts;
            echo view('template/header');
            echo view('hub', $data);
            echo view('template/footer');
        } elseif(!empty($title)) {
            $posts = $model->filterTitle($title);
            //print_r ($posts);
            $data['posts'] = $posts;
            echo view('template/header');
            echo view('hub', $data);
            echo view('template/footer');
        } elseif(!empty($tag)) {
            $posts = $model->filterTag($tag);
            //print_r ($posts);
            $data['posts'] = $posts;
            echo view('template/header');
            echo view('hub', $data);
            echo view('template/footer');
        } elseif(!empty($author)) {
            $posts = $model->filterAuthor($author);
            //print_r ($posts);
            $data['posts'] = $posts;
            echo view('template/header');
            echo view('hub', $data);
            echo view('template/footer');
        } else {
            $posts = $model->filteredSearch($tag, $author, $title);
            //print_r ($posts);
            $data['posts'] = $posts;
            echo view('template/header');
            echo view('hub', $data);
            echo view('template/footer');
        }
    }
}