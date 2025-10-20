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

        $builder = $this->db->table('kdramas k')
            ->select('k.*, kk.nama_kategori')
            ->join('kategori_kdrama kk', 'kk.id = k.kategori_id', 'left')
            ->orderBy('k.id', 'DESC');

        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
