<?php

namespace App\Models;

use CodeIgniter\Model;

class KDramaModel extends Model
{

    protected $table      = 'kdrama'; // HARUS 'kdramas' (plural)
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'slug',
        'sutradara',
        'penayangan',
        'tahun_tayang',
        'deskripsi',
        'rate',
        'poster',
        'kategori_id',
    ];

    protected $useTimestamps = true;
    public function getKDrama($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
