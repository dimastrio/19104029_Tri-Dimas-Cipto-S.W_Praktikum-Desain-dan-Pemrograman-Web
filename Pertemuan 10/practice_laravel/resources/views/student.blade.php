@extends('template.base')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (session('pesan'))
                <div class="alert alert-success">
                    {{ session('pesan') }}
                </div>
        @endif

        <h4>Data Mahasiswa</h4>

        <hr>

        <h5>Tabel Biasa</h5>

        <a href="{{ route('student.create') }}" class="btn btn-primary mb-2">Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                @forelse ($student as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->name }}</td>
                    <td>{{ $mahasiswa->gender }}</td>
                    <td>{{ $mahasiswa->departement }}</td>
                    <td>{{ $mahasiswa->address }}</td>
                    <td>

                        
                        <form action="{{ route('student.destroy', ['id' => $mahasiswa->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('student.edit', ['id' => $mahasiswa->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="7">Data Tidak Ada</td>
                </tr>
                @endforelse
            </table>

            <hr>

            <tbody>
                
                <h5>Data Tables</h5>
                <a href="{{ route('student.create') }}" class="btn btn-primary mb-2">Tambah</a>
                <div class="table-responsive">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($student as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->name }}</td>
                    <td>{{ $mahasiswa->gender }}</td>
                    <td>{{ $mahasiswa->departement }}</td>
                    <td>{{ $mahasiswa->address }}</td>
                    <td>

                        
                        <form action="{{ route('student.destroy', ['id' => $mahasiswa->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('student.edit', ['id' => $mahasiswa->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="7">Data Tidak Ada</td>
                </tr>
                @endforelse
            </table>
            </tbody>

        </div>
    </div>
</div>

@endsection
