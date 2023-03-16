@extends('layouts.global')

@section('title')
    Ini adalah halaman Kelurahan
@endsection

@section('content')
    <div class="container px-4 py-5">
        @if (session('success'))
            <div class="alert alert-success">
                <b>Yeah!</b> {{ session('success') }}
            </div>
        @endif

        <a href="/kelurahan/create" class=""><Button class="btn btn-primary mb-3">Tambah</Button></a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelurahan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelurahans as $kelurahan)
                <tr>
                <th scope="row">{{ $kelurahan->id }}</th>
                <td>{{ $kelurahan->nama }}</td>
                <td>{{ $kelurahan->kecamatan->nama }}</td>
                <td>

                <a href="{{ route('kelurahan.show', $kelurahan->id) }}" class=""><Button class="btn btn-success mb-3">Lihat</Button></a>
                <a href="{{ route('kelurahan.edit', $kelurahan->id) }}" class=""><Button class="btn btn-primary mb-3">Edit</Button></a>
                <form method="post" action="{{ route('kelurahan.delete', $kelurahan->id) }}" method="post" style="display: inline" onsubmit="confirm('Apakah Kamu Yakin?')">
                    @csrf
                    @method('delete')
                    <Button type="submit" class="btn btn-danger mb-3">Delete</Button>
                </form>

                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection