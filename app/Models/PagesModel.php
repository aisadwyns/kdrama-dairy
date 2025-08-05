<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'kdrama';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'sutradara', 'penayangan', 'deskripsi', 'rate', 'kategori', 'poster'];

    public function getKDrama($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
