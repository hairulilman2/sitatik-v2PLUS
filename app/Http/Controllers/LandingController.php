<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        $statistik = [
            'kategori' => 22,
            'data' => 87583,
            'pengguna' => 108,
            'pengunjung' => 1261,
        ];

        $kategori = [
            ['nama' => 'Perkebunan', 'deskripsi' => 'Data luas dan produksi kebun', 'gambar' => 'image/perkebunan.jpg'],
            ['nama' => 'keadaan geografi', 'deskripsi' => 'Data luas dan produksi kebun', 'gambar' => 'image/geografis.jpg'],
            ['nama' => 'data sektoral', 'deskripsi' => 'Data luas dan produksi kebun', 'gambar' => 'image/sektoral.jpg'],
            ['nama' => 'matriks data', 'deskripsi' => 'Data luas dan produksi kebun', 'gambar' => 'image/matriks.jpg'],
            ['nama' => 'agama dan sosial lainnya', 'deskripsi' => 'Data luas dan produksi kebun', 'gambar' => 'image/agama.jpg'],
            ['nama' => 'Perikanan', 'deskripsi' => 'Data luas dan produksi kebun', 'gambar' => 'image/perikanan.jpg'],
            ];
        

        return view('landing.index', compact('statistik', 'kategori'));
    }
}