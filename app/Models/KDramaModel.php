<?php

namespace App\Models;

use CodeIgniter\Model;

class KDramaModel extends Model
{
    protected $table = 'kdrama';
    protected $useTimestamps = false;
    protected $allowedFields = ['judul', 'slug', 'sutradara', 'penayangan', 'poster'];

    public function getKDrama($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
