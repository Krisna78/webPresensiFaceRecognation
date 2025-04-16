<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelajaranController extends Controller
{
    public function index() {
        $pelajaran = Pelajaran::all();
        return view('pelajaran.index',compact('pelajaran'));
    }
    public function create()
    {
        return view('pelajaran.create');
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'nama_pelajaran' => ['required','max:20'],
            'jam' => ['required'],
            'id_kelas' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Pelajaran::create($validator->validated());
        return redirect()->route('pelajaran.index')->with('success','Pelajaran berhasil ditambahkan');
    }
    public function show(Pelajaran $pelajaran)
    {
        return view('pelajaran.show',compact('pelajaran'));
    }
    public function edit(Pelajaran $pelajaran)
    {
        return view('pelajaran.edit',compact('pelajaran'));
    }
    public function update(Request $request,Pelajaran $pelajaran) {
        $validator = Validator::make($request->all(),[
            'nama_pelajaran' => ['required','max:20'],
            'jam' => ['required'],
            'id_kelas' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $pelajaran->update($validator->validated());
        return redirect()->route('pelajaran.index')->with('success','Pelajaran berhasil diupdate');
    }
    public function destroy(Pelajaran $pelajaran)
    {
        $pelajaran->delete();
        return redirect()->route('pelajaran.index')->with('success','Pelajaran telah terhapus');
    }
}
