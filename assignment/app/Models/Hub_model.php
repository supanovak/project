<?php
namespace App\Models;

use CodeIgniter\Model;

class Hub extends Model
{
    public function getPosts() {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ;
        return $builder->get()->getResultArray();
    }

    public function filteredSearch($title, $tag, $author) {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->where('tag', $tag)
        ->like('user', $author)
        ->like('title', $title)
        ;
        return $builder->get()->getResultArray();
    }

    public function filterTitle($title) {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->like('title', $title)
        ;
        return $builder->get()->getResultArray();
    }

    public function filterTag($tag) {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->like('tag', $tag)
        ;
        return $builder->get()->getResultArray();
    }

    public function filterAuthor($author) {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->like('CONCAT(first_name, " ", last_name)', $author)
        ;
        return $builder->get()->getResultArray();
    }

    public function getAuthor($author) {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->select('CONCAT(first_name, " ", last_name)')
        ->join('users','posts.user = users.id')
        ;
    }
}