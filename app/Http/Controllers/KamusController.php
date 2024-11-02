<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;






class KamusController extends Controller

{
    protected $injuries = [];
    protected $injury_instructions = [];

    public function __construct()
    {
        $this->injuries = [
            [
                'id' => 1,
                'name' => 'Luka Bakar',
                'image' => 'lukabakar.svg',  // Gambar Luka Bakar
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'CPR',
                'image' => 'cpr.svg',  // Gambar CPR
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Syok',
                'image' => 'syok.svg',  // Gambar Syok
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Luka Sayat',
                'image' => 'mimisan.svg',  // Gambar Mimisan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Keracunan',
                'image' => 'cpr.svg',  // Gambar CPR untuk Keracunan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Alergi',
                'image' => 'syok.svg',  // Gambar Syok
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Mimisan',
                'image' => 'mimisan.svg',  // Gambar Mimisan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Tersedak',
                'image' => 'lukabakar.svg',  // Gambar Luka Bakar
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Asma',
                'image' => 'cpr.svg',  // Gambar Asma
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Patah Tulang',
                'image' => 'syok.svg',  // Gambar Syok
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => 'Kejang',
                'image' => 'mimisan.svg',  // Gambar Mimisan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'name' => 'Pingsan',
                'image' => 'mimisan.svg',  // Gambar Mimisan
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        $this->injury_instructions = [
            [
                'id' => 1,
                'injury_id' => 1,  // Luka Bakar
                'step_number' => 1,
                'instruction' => 'Dinginkan luka bakar dengan air bersih yang mengalir selama 10 hingga 20 menit.',
                'image' => 'burn_step1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'injury_id' => 1,  // Luka Bakar
                'step_number' => 2,
                'instruction' => 'Jika tidak menempel di kulit, lepas semua pakaian dan perhiasan yang melekat atau dekat kulit yang terbakar.',
                'image' => 'burn_step2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'injury_id' => 1,  // Luka Bakar
                'step_number' => 3,
                'instruction' => 'Jika perlu menunggu perawatan medis, tutupi luka bakar dengan kain basah atau bungkus plastik.',
                'image' => 'burn_step3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'injury_id' => 1,  // Luka Bakar
                'step_number' => 4,
                'instruction' => 'Jika ada risiko mengalami syok, bantu mereka untuk berbaring dan pastikan mereka tetap hangat.',
                'image' => 'burn_step4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
    public function index()
    {
        return view('kamus', ['injuries' => $this->injuries]);
    }

    public function insturksi(int $id)
    {
        $instructions = array_filter($this->injury_instructions, function ($instruction) use ($id) {
            return $instruction['injury_id'] === $id;
        });
        return view('instruksi', ['instructions' => $instructions]);
    }
}
