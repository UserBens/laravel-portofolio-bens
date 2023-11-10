@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Education</p>
    <div class="pb-3"><a href="{{ route('education.create') }}" class="btn btn-primary">+ Tambah Edukasi</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="">No</th>
                    <th class="col-2">Universitas</th>
                    <th class="col-1">Faklutas</th>
                    <th class="col-2">Program Studi</th>
                    <th class="col-1">IPK</th>
                    <th class="col-2">Tanggal Mulai</th>
                    <th class="col-2">Tanggal Akhir</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($education as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->info2 }}</td>
                        <td>{{ $item->info3 }}</td>
                        <td>{{ $item->tgl_mulai_indo }}</td>
                        <td>{{ $item->tgl_akhir_indo }}</td>
                        {{-- <td>{{ $item->created_at }}</td> --}}
                        <td>
                            <a href='{{ route('education.edit', $item->id) }}' class="btn btn-sm btn-warning">Edit</a>

                            <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"
                                action="{{ route('education.destroy', $item->id) }}" method="POST" class="d-inline">
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
