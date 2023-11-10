<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExperienceController extends Controller
{
    private $_tipe;
    function __construct()
    {
        
        $this->_tipe = 'experience';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.experience.index', [
            'experience' => $experience
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul Wajib Di isi',
                'info1.required' => 'Nama Perusahaan Wajib Di isi',
                'tgl_mulai.required' => 'Tanggal Mulai Wajib Di isi',
                'isi.required' => 'isian Wajib Di isi'
            ]

        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi,
        ];

        riwayat::create($data);

        return redirect()->route('experience.index')->with('success', 'Sukses Melakukan Penambahan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $experience = riwayat::where('id', $id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.experience.edit', [
            'experience' => $experience
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
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul Wajib Di isi',
                'info1.required' => 'Nama Perusahaan Wajib Di isi',
                'tgl_mulai.required' => 'Tanggal Mulai Wajib Di isi',
                'isi.required' => 'isian Wajib Di isi'
            ]

        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi,
        ];

        riwayat::where('id', $id)->update($data);

        return redirect()->route('experience.index')->with('success', 'Sukses Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('experience.index')->with('success', 'Sukses Melakukan Hapus Data');
    }
}
