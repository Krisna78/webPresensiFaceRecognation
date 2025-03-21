<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presensi = Presensi::all();
        return view('presensi.index',compact('presensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('presensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            // ! Perlu dipenyesuaian pada 'hari' apakah dalam bentuk enum atau bentuk tanggal
            'hari' => ['required','date'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
            'id_kelas' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Presensi::create($validator);
        return redirect()->route('presensi.index')->with('success','Jadwal berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presensi $presensi)
    {
        return view('presensi.show',compact('presensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presensi $presensi)
    {
        return view('presensi.edit',compact('presensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presensi $presensi)
    {
        $validator = Validator::make($request->all(),[
            'hari' => ['required'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
            'id_kelas' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $presensi->update($validator->validated());
        return redirect()->route('presensi.index')->with('success','Jadwal berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presensi $presensi)
    {
        $presensi->delete();
        return redirect()->route('presensi.index')->with('success','Jadwal berhasil dihapus');
    }
}
