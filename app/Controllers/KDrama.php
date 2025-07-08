<?php

namespace App\Controllers;

use App\Models\KDramaModel;

use function PHPUnit\Framework\throwException;

class KDrama extends BaseController
{

    //butuh properti 
    protected $kdramaModel;
    //supaya ketika lu nanti ga manggil trs modelnya, dan biar semua method bisa langsung manggil asi model
    public function __construct()
    {
        //instansiasi class modelnya
        $this->kdramaModel = new KDramaModel();
    }

    public function index()
    {
        // $kdrama = $this->kdramaModel->findAll();

        $data = [
            'title' => 'daftar Drama',
            'kdrama' => $this->kdramaModel->getKDrama()

        ];
        // $kdramaModel = new KDramaModel();


        return view('kdrama/index', $data);
    }

    public function detail($slug)
    {
        // $kdrama = $this->kdramaModel->getKDrama($slug);
        // dd($kdrama);

        $data = [
            'title' => 'Detail KDrama',
            'kdrama' => $this->kdramaModel->getKDrama($slug)
        ];

        if (empty($data['kdrama'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul drama ' . $slug . ' tidak ditemukan.');
        }



        return view('kdrama/detail', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Form Tambah Data K-Drama',

        ];

        return view('kdrama/create', $data);
    }

    public function save()
    {
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->kdramaModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sutradara' => $this->request->getVar('sutradara'),
            'penayangan' => $this->request->getVar('penayangan'),
            'poster' => $this->request->getVar('poster'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/kdrama');
    }
}
