<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
   
    public function index(Request $request)
    {
        $search = $request->input('q');

        $query = Buku::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('pengarang', 'like', "%{$search}%");
            });
        }

        $buku = $query->get();

        return view('buku.index', compact('buku', 'search'));
    } 

    
    public function create()
    {
        return view ('buku.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'judul'=> 'required',
            'pengarang'=> 'required',
            'penerbit'=> 'required',
            'tahun_terbit'=> 'required|digits:4',
            'jumlah_stok'=> 'required|integer',
        ]);

        Buku::create($request->all());
        return 
        redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

   
    public function show(Buku $buku)
    {
        
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

   
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
        'judul'        => 'required',
        'pengarang'    => 'required',
        'penerbit'     => 'required',
        'tahun_terbit' => 'required|digits:4',
        'jumlah_stok'  => 'required|integer',
    ]);

    $buku->update($request->only([
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'jumlah_stok',
    ]));

    return redirect()->route('buku.index')->with('success', 'Data buku berhasil diupdate.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return
        redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
