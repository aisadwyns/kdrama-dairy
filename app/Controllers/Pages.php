<?php

namespace App\Controllers;

use App\Models\PagesModel;

class Pages extends BaseController
{
    //butuh properti 
    protected $pagesModel;
    //supaya ketika lu nanti ga manggil trs modelnya, dan biar semua method bisa langsung manggil asi model
    public function __construct()
    {
        //instansiasi class modelnya
        $this->pagesModel = new PagesModel();
    }
    public function index()
    {
        $data = [
            'title' => 'daftar Drama',
            'kdrama' => $this->pagesModel->getKDrama()

        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $faker = \Faker\Factory::create();
        $data = [
            'title' => 'About Me'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. Seokarno Hatta',
                    'kota' => 'Lumajang'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Seodirman no 32',
                    'kota' => 'Lumajang'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title'  => 'Detail KDrama',
            'kdrama' => $this->pagesModel->getKDrama($slug) // <-- ganti getPages -> getKDrama
        ];

        if (empty($data['kdrama'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul drama ' . $slug . ' tidak ditemukan.');
        }

        return view('pages/review', $data);
    }
}
