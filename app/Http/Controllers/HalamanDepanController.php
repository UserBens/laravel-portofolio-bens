<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\riwayat;
use Illuminate\Http\Request;

class HalamanDepanController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = halaman::where('id', $about_id)->first();

        return view('halamandepan.index', [
            'about' => $about_data,
        ]);
    }

    private $_tipe;
    function __construct()
    {
        
        $this->_tipe = 'experience';
    }

    public function resume()
    {
        $experience = riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir', 'desc')->get();

        return view('halamandepan.resume', [
            'resume' => $experience,
        ]);
    }

    public function education()
    {
        $experience = riwayat::where('tipe', 'education')->orderBy('tgl_akhir', 'desc')->get();

        return view('halamandepan.resume', [
            'resume' => $experience,
        ]);
    }

}
