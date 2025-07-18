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
        helper('form');
        session();
        $data = [
            'title' => 'Form Tambah Data K-Drama',
            'validation' => \Config\Services::validation()

        ];

        return view('kdrama/create', $data);
    }

    public function save()
    {

        // validation input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[kdrama.judul]',
                'errors' => [
                    'required' => '{field} kdrama harus di isi',
                    'is_unique' => '{field} kdrama sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kdrama/create')->withInput()->with('validation', $validation);
        }

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

    public function delete($id)
    {
        $this->kdramaModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/kdrama');
    }

    public function edit($slug)
    {
        helper('form');
        session();
        $data = [
            'title' => 'Form Ubah Data K-Drama',
            'validation' => \Config\Services::validation(),
            'kdrama' => $this->kdramaModel->getKDrama($slug)
        ];

        return view('kdrama/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $kdramaLama = $this->kdramaModel->getKDrama($this->request->getVar('slug'));
        if ($kdramaLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[kdrama.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} kdrama harus di isi',
                    'is_unique' => '{field} kdrama sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kdrama/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->kdramaModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sutradara' => $this->request->getVar('sutradara'),
            'penayangan' => $this->request->getVar('penayangan'),
            'poster' => $this->request->getVar('poster'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/kdrama');
    }
}
