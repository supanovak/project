<?php

namespace App\Models;

use CodeIgniter\Model;

class Upload extends Model
{
    public function upload($filename) {
        $file = [
            'filename' => $filename,
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('uploads')
        ;
        if ($builder->insert($file)) {
            return true;
        } else {
            return false;
        }
    }

    public function upload_multiple($filename) {
        foreach($array as $value) {
            ;
        }
    }
        
}