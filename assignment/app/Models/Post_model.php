<?php
namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
    public function getPostID() {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->selectMax('pid')
        ;
        return $builder->get()->getResultArray();
    }

    public function postQuestion($post_details) {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->insert($post_details)
        ;
        return true;
    }
}