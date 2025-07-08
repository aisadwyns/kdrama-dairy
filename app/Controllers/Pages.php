<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | AISA'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
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
}
