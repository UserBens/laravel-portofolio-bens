<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halaman = halaman::orderBy('judul', 'asc')->get();

        return view('dashboard.halaman.index', [
            'halaman' => $halaman

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul Wajib Di isi',
                'isi.required' => 'isian Wajib Di isi'
            ]

        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        halaman::create($data);

        return redirect()->route('halaman.index')->with('success', 'Sukses Melakukan Penambahan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $halaman = halaman::where('id', $id)->first();
        return view('dashboard.halaman.edit', [
            'halaman' => $halaman
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul Wajib Di isi',
                'isi.required' => 'isian Wajib Di isi'
            ]

        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        halaman::where('id', $id)->update($data);

        return redirect()->route('halaman.index')->with('success', 'Sukses Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        halaman::where('id', $id)->delete();
        return redirect()->route('halaman.index')->with('success', 'Sukses Melakukan Hapus Data');
    }
}
