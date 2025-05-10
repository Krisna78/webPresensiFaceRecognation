<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\DetailPresensi;
use Illuminate\Http\Request;

class DetailPresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absen = DetailPresensi::all();
        return view('absen.index',compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('absen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'waktu_presensi' => ['required','date'],
            'kehadiran' => ['required','string'],
            'kepulangan' => ['required','string'],
            'id_user' => ['sometimes'],
            'id_presensi' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DetailPresensi::create($validator->validated());
        return redirect()->route('absen.index')->with('success','Presensi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailPresensi $detailPresensi)
    {
        return view('absen.show',compact('detailPresensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailPresensi $detailPresensi)
    {
        return view('absen.edit',compact('detailPresensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailPresensi $detailPresensi)
    {
        $validator = Validator::make($request->all(),[
            'waktu_presensi' => ['required','date'],
            'kehadiran' => ['required','string'],
            'kepulangan' => ['required','string'],
            'id_user' => ['sometimes'],
            'id_presensi' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $detailPresensi->update($validator->validated());
        return redirect()->route('absen.index')->with('success','Presensi berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPresensi $detailPresensi)
    {
        $absen->delete();
        return redirect()->route('absen.index')->with('success','Presensi berhasil dihapus');
    }
}
