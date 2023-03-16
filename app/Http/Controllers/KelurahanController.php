<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index(){
        return view('kelurahan.index', [
            'kelurahans' => Kelurahan::all(),
            'title' => 'Kelurahan'
        ]);
    }

    public function create(){
        return view('kelurahan.create', [
            'kecamatans' => Kecamatan::all(),
            'title' => 'Kelurahan'
        ]);
    }
    
    public function store(Request $request){
        $validateData  = $request->validate([
            'nama' => 'required|string|max:100',
            'kecamatan_id' => 'required'
        ]);
        Kelurahan::create($validateData);
        
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan Berhasil Ditambahkan');
    }
    
    public function show(Kelurahan $id){
        return view('kelurahan.show', [
            'kelurahan' => $id,
            'title' => 'Kelurahan',
        ]);
    }

    public function edit(Kelurahan $id){
        return view('kelurahan.edit', [
            'title' => 'Kelurahan',
            'kelurahan' => $id,
            'kecamatans' => Kecamatan::all(),
        ]);
    }

    public function destroy($id){
        $kelurahan = Kelurahan::findOrfail($id);
        $kelurahan->delete();

        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan Berhasil Diupdate');
    }

    public function update(Request $request, $id){
        $kelurahan = Kelurahan::findOrfail($id);
        $validateData  = $request->validate([
            'nama' => 'required|string|max:100',
            'kecamatan_id' => 'required'
        ]);
        $kelurahan->update($validateData);

        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan Berhasil Diupdate');

    }
}
