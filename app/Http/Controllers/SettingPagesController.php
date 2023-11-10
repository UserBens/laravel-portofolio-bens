<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class SettingPagesController extends Controller
{
    public function index()
    {
        $halaman = halaman::orderBy('judul', 'asc')->get();

        return view('dashboard.settingpages.index', [
            'halaman' => $halaman,
        ]);
    }

    public function update(Request $request)
    {
        metadata::updateOrCreate(['meta_key' => '_halaman_about'], ['meta_value' => $request->_halaman_about]);
        metadata::updateOrCreate(['meta_key' => '_halaman_interest'], ['meta_value' => $request->_halaman_interest]);
        metadata::updateOrCreate(['meta_key' => '_halaman_award'], ['meta_value' => $request->_halaman_award]);

        return redirect()->route('settingpages.index')->with('success', ' Berhasil Melakukan Update Data');
    }
}
