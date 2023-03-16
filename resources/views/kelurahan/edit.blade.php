@extends('layouts.global')
    @section('title')
        Edit Kelurahan
    @endsection

    @section('content')
        <div class="container">
            <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control form-control@error('nama') is-invalid@enderror" id="nama" name="nama" value="{{$kelurahan->nama}}" placeholder="Nama Kelurahan" required>
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label ">Prodi</label>
                    <select name="kecamatan_id" id="kecamatan_id" class="form-control form-select@error('kecamatan_id') is-invalid@enderror"
                        aria-label="Default select example">
                        <option value="" selected>Pilih</option>
                        @foreach ($kecamatans as $kecamatan)
                            <option value={{ $kecamatan->id }}>{{ $kecamatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    @endsection