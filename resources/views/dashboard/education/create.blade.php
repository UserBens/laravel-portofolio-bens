@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('education.index') }}" class="btn btn-secondary">Kembali</a></div>

    <form action="{{ route('education.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Universitas</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul"
                aria-describedby="helpId" placeholder="Asal Universitas" value="{{ Session::get('judul') }}">
        </div>

        <div class="mb-3">
            <label for="info1" class="form-label">Nama Fakultas</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1"
                aria-describedby="helpId" placeholder="Nama Fakultas" value="{{ Session::get('info1') }}">
        </div>
       
        <div class="mb-3">
            <label for="info2" class="form-label">Program Studi</label>
            <input type="text" class="form-control form-control-sm" name="info2" id="info2"
                aria-describedby="helpId" placeholder="Program Studi" value="{{ Session::get('info2') }}">
        </div>
       
        <div class="mb-3">
            <label for="info3" class="form-label">IPK</label>
            <input type="text" class="form-control form-control-sm" name="info3" id="info3"
                aria-describedby="helpId" placeholder="IPK" value="{{ Session::get('info3') }}">
        </div>
        
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai" placeholder="dd/mm/yy" value="{{ Session::get('tgl_mulai') }}"></div>
                <div class="col-auto">Tanggal Akhir</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir" placeholder="dd/mm/yy" value="{{ Session::get('tgl_akhir') }}"></div>
            </div>
        </div>

        {{-- <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control summernote" name="isi" rows="5">{{ Session::get('isi') }}</textarea>
        </div> --}}

        <button class="btn btn-primary" name="simpan" type="submit">Submit</button>
    </form>
@endsection
