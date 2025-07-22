<?php

namespace App\Controllers;

use App\Models\AktorModel;

use function PHPUnit\Framework\throwException;

class Aktor extends BaseController
{

    //butuh properti 
    protected $aktorModel;
    //supaya ketika lu nanti ga manggil trs modelnya, dan biar semua method bisa langsung manggil asi model
    public function __construct()
    {
        //instansiasi class modelnya
        $this->aktorModel = new AktorModel;
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_aktor') ? $this->request->getVar('page_aktor') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $aktor = $this->aktorModel->search($keyword);
        } else {
            $aktor = $this->aktorModel;
        }

        $data = [
            'title' => 'daftar Aktor',
            'aktor' => $aktor->paginate(6, 'aktor'),
            'pager' => $this->aktorModel->pager,
            'currentPage' => $currentPage

        ];

        return view('/aktor/index', $data);
    }
}
