@extends('global')
@section('content')
<a type="button" class="btn btn-primary" href="/home/tambah">Tambah Kosma</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">Kelas</th>
            <th scope="col">Semester</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kosma as $p)
        <tr>
            <td>{{ $p->kosma_nim }}</td>
            <td>{{ $p->kosma_nama }}</td>
            <td>{{ $p->kosma_matakul }}</td>
            <td>{{ $p->kosma_kelas }}</td>
            <td>{{ $p->kosma_semester }}</td>
            <td>
                <a type="button" class="btn btn-warning" href="/home/edit/{{ $p->kosma_id }}">Edit</a>
                |
                <a type="button" class="btn btn-danger" href="/home/hapus/{{ $p->kosma_id }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection