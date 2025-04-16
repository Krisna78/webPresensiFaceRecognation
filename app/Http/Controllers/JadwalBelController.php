<?php

namespace App\Http\Controllers;

use App\Models\JadwalBel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalBelController extends Controller
{
    public function index() {
        $bel = JadwalBel::all();
        return view('jadwal.index',compact('bel'));
    }
    public function create()
    {
        return view('jadwal.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hari' => ['required'],
            'jam' => ['required'],
            'keterangan' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        JadwalBel::create($validator->validated());
        return redirect()->route('jadwal.index')->with('success','Jadwal Bel berhasil ditambahkan');
    }
    public function show(JadwalBel $jadwal_bel)
    {
        return view('jadwal.show',compact('jadwal_bel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalBel $jadwal_bel)
    {
        return view('jadwal.edit',compact('jadwal_bel'));
    }
    public function update(Request $request,JadwalBel $jadwal_bel)
    {
        $validator = Validator::make($request->all(), [
            'hari' => ['required'],
            'jam' => ['required'],
            'keterangan' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $jadwal_bel->update($validator->validated());
        return redirect()->route('jadwal.index')->with('success','Jadwal Bel berhasil diupdate');
    }
    public function destroy(JadwalBel $jadwal_bel)
    {
        $jadwal_bel->delete();
        return redirect()->route('jadwal.index')->with('success','Jadwal telah terhapus');
    }
}
