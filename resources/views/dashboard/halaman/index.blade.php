@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Halaman</p>
    <div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn btn-primary">+ Tambah Halaman</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th class="col-3">Tanggal</th>
                    <th class="col-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($halaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href='{{ route('halaman.edit', $item->id) }}' class="btn btn-sm btn-warning">Edit</a>

                            <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"
                                action="{{ route('halaman.destroy', $item->id) }}" method="POST" class="d-inline">
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
