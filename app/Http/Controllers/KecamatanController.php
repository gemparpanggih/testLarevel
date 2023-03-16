<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index(){
        return view('kecamatan.index', [
            'kecamatans' => Kecamatan::all(),
            'title' => 'Kecamatan'
        ]);
    }

    public function create(){
        return view('kecamatan.create', [
            'kelurahans' => Kelurahan::all(),
            'title' => 'Kecamatan'
        ]);
    }
    
    public function store(Request $request){
        $validateData  = $request->validate([
            'nama' => 'required|string|max:100',
        ]);
        Kecamatan::create($validateData);
        
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan Berhasil Ditambahkan');
    }
    
    public function show(Kecamatan $id){
        return view('kecamatan.show', [
            'kecamatan' => $id,
            'title' => 'Kecamatan',
        ]);
    }

    public function edit(Kecamatan $id){
        return view('kecamatan.edit', [
            'title' => 'Kecamatan',
            'kecamatan' => $id,
            'kelurahans' => Kelurahan::all(),
        ]);
    }

    public function destroy($id){
        $kecamatan = Kecamatan::findOrfail($id);
        $kecamatan->delete();

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan Berhasil Diupdate');
    }

    public function update(Request $request, $id){
        $kecamatan = Kecamatan::findOrfail($id);
        $validateData  = $request->validate([
            'nama' => 'required|string|max:100',
        ]);
        $kecamatan->update($validateData);

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan Berhasil Diupdate');

    }
}
