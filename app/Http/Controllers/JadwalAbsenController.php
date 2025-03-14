<?php

namespace App\Http\Controllers;

use App\Models\JadwalAbsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalAbsen = JadwalAbsen::all();
        return view('jadwalAbsen.index',compact('jadwalAbsen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwalAbsen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'hari' => ['required'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        JadwalAbsen::create($validator);
        return redirect()->route('jadwalAbsen.index')->with('success','Jadwal berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalAbsen $jadwalAbsen)
    {
        return view('jadwalAbsen.show',compact('jadwalAbsen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalAbsen $jadwalAbsen)
    {
        return view('jadwalAbsen.edit',compact('jadwalAbsen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalAbsen $jadwalAbsen)
    {
        $validator = Validator::make($request->all(),[
            'hari' => ['required'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $jadwalAbsen->update($validator->validated());
        return redirect()->route('jadwalAbsen.index')->with('success','Jadwal berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalAbsen $jadwalAbsen)
    {
        $jadwalAbsen->delete();
        return redirect()->route('jadwalAbsen.index')->with('success','Jadwal berhasil dihapus');
    }
}
