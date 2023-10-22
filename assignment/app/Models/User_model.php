<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    public function login($email) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')
        ->select('email, password')
        ->where('email', $email)
        ;
        return $query = $builder->get()->getResultArray();
    }

    public function check_register($email) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('email')
        ->where('email', $email)
        ;
        $query = $builder->get();
        if ($query->getRowArray()) {
            return false;
        }
        return true;
    }

    public function register($register_details) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')
        ->insert($register_details)
        ;
    }

    public function handle_secret_questions($question_details) {
        $db = \Config\Database::connect();
        $builder = $db->table('secret_questions')
        ->join('users', 'secret_questions.user = users.id')
        ->insert($question_details)
        ;
    }

    public function get_name_id() {
        $db = \Config\Database::connect();
        $builder = $db->table('users')
        ->select('id, CONCAT(first_name, " ", last_name) as name')
        ->join('posts','posts.user = users.id')
        ;
        return $builder->get()->getResultArray();
    }

    public function profile($email) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')
        ->where('email', $email)
        ;
        return $builder->get()->getResultArray();
    }

    public function changeProfile($profile_details) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        // $builder->insert($data);
    }

    public function getPopular() {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->join('uploads', 'posts.pid = uploads.post')
        ->orderBy('likes DESC, views DESC')
        ->limit(2)
        ;
        return $builder->get()->getResultArray();
    }

    public function getRecent() {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->join('uploads', 'posts.pid = uploads.post')
        ;
        $recent = $builder
        ->orderBy('date', 'DESC')
        ->limit(2);
        return $builder->get()->getResultArray();
    }

    public function yourPosts($email) {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->join('uploads', 'posts.pid = uploads.post')
        ->where('email', $email)
        ;
        return $builder->get()->getResultArray();
    }

    public function yourFavourites($email) {
        $db = \Config\Database::connect();
        $builder = $db->table('favourites')
        ->join('posts', 'favourites.fav_post_id = posts.pid')
        ->join('users','favourites.user = users.id')
        ->where('email', $email)
        ;
        return $builder->get()->getResultArray();
    }
}
