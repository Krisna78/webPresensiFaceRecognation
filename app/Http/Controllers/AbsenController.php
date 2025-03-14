<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absen = Absen::all();
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
            'waktu_absen' => ['required'],
            'status' => ['required','string'],
            'jenis_absen' => ['required','string'],
            'id_user' => ['sometimes'],
            'id_jadwal' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Absen::create($validator->validated());
        return redirect()->route('absen.index')->with('success','Presensi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absen $absen)
    {
        return view('absen.show',compact('absen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absen $absen)
    {
        return view('absen.edit',compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absen $absen)
    {
        $validator = Validator::make($request->all(),[
            'waktu_absen' => ['required'],
            'status' => ['required','string'],
            'jenis_absen' => ['required','string'],
            'id_user' => ['sometimes'],
            'id_jadwal' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $absen->update($validator->validated());
        return redirect()->route('absen.index')->with('success','Presensi berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absen $absen)
    {
        $absen->delete();
        return redirect()->route('absen.index')->with('success','Presensi berhasil dihapus');
    }
}
