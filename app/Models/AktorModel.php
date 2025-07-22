<?php

namespace App\Models;

use CodeIgniter\Model;

class AktorModel extends Model
{
    protected $table = 'aktor';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'agensi',];

    public function getAktor()
    {
        return $this->findAll();
    }

    public function search($keyword)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);

        return $this->table('orang')->like('nama', $keyword)->orLike('agensi', $keyword);
    }
}
