@extends('layouts.global')

@section('title')
    Create Kelurahan
@endsection

@section('content')
    <div class="container">
        <form action="/kelurahan/store" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>

                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kelurahan" required>

            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan_id" class="form-select" aria-label="Default select example">
                    <option value="" selected>Pilih</option>
                        @foreach ($kecamatans as $kecamatan)
                            <option value={{ $kecamatan->id }}>{{ $kecamatan->nama}}</option>

                        @endforeach
                </select>

            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
@endsection