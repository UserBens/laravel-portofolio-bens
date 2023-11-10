@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Experience</p>
    <div class="pb-3"><a href="{{ route('experience.create') }}" class="btn btn-primary">+ Tambah Experience</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Posisi</th>
                    <th class="col-3">Nama Perusahaan</th>
                    <th class="col-2">Tanggal Mulai</th>
                    <th class="col-2">Tanggal Akhir</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($experience as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->tgl_mulai_indo }}</td>
                        <td>{{ $item->tgl_akhir_indo }}</td>
                        {{-- <td>{{ $item->created_at }}</td> --}}
                        <td>
                            <a href='{{ route('experience.edit', $item->id) }}' class="btn btn-sm btn-warning">Edit</a>

                            <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"
                                action="{{ route('experience.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
