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
            ],
            'sutradara' => 'required',
            'penayangan' => 'required',

            'poster' => [
                'rules' => 'max_size[poster,1024]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang dipilih bukan gambar',
                    'mime_in' => 'yang dipilih bukan gambar',
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/kdrama/create')->withInput()->with('validation', $validation);
            return redirect()->to('/kdrama/create')->withInput();
        }

        //ambil gambar
        $filePoster = $this->request->getFile('poster');
        if ($filePoster->getError() == 4) {
            $namaPoster = 'default.jpg';
        } else {
            //generate nama poster random
            $namaPoster = $filePoster->getRandomName();
            //pindahkan file ke folder img
            $filePoster->move('img', $namaPoster);
            //ambil nama file poster
            $filePoster = $filePoster->getName();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->kdramaModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sutradara' => $this->request->getVar('sutradara'),
            'penayangan' => $this->request->getVar('penayangan'),
            'poster' => $namaPoster,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/kdrama');
    }

    public function delete($id)
    {

        //menghapus gambar
        $kdrama = $this->kdramaModel->find($id);

        //cek jika file gambarnya default.jpg
        if ($kdrama['poster'] != 'default.jpg') {
            unlink('img/' . $kdrama['poster']);
        }

        $this->kdramaModel->delete($id);
        /**sebenarnya fungsi ini itu buat menghapus data didalam model, model itu kan datanya dari tabel, jadi file kayak gambar poster itu ngga ikut kehapus, makanya butuh code lagi, yang nyari filenya berdasarkan id, jdi sy tulis diatas*/

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
            ],
            'sutradara' => 'required',
            'penayangan' => 'required',

            'poster' => [
                'rules' => 'max_size[poster,1024]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang dipilih bukan gambar',
                    'mime_in' => 'yang dipilih bukan gambar',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/kdrama/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/kdrama/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $filePoster = $this->request->getFile('poster');

        //cek gambar, apakah tetap gambar lama
        if ($filePoster->getError() == 4) {
            $namaPoster = $this->request->getVar('posterLama'); // posterLama diambil dari hidden dalam view edit 
        } else {
            //generate nama file random
            $namaPoster = $filePoster->getRandomName();
            //pindahkan gambar
            $filePoster->move('img', $namaPoster);
            //hapus gambar lama (biar ga menuh menuhin server lah)
            $posterLama = $this->request->getVar('posterLama');
            if ($posterLama != 'default.jpg' && file_exists('img/' . $posterLama)) {
                unlink('img/' . $posterLama);
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->kdramaModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sutradara' => $this->request->getVar('sutradara'),
            'penayangan' => $this->request->getVar('penayangan'),
            'poster' => $namaPoster
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/kdrama');
    }
}
