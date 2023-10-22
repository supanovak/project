<?php
namespace App\Models;

use CodeIgniter\Model;

class Home extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'pid';
    public function getPopular()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ->orderBy('likes DESC, views DESC')
        ->limit(2)
        ;
        return $builder->get()->getResultArray();
    }

    public function getRecent()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('posts')
        ->join('users','posts.user = users.id')
        ;
        $recent = $builder
        ->orderBy('date', 'DESC')
        ->limit(2);
        return $builder->get()->getResultArray();
    }
}