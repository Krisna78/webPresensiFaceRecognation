<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ortu = Ortu::all();
        return view('ortu.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ortu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => ['required','string','min:8'],
            'username' => ['required','string','min:8','lowercase'],
            'password' => ['required','password','min:8'],
            'no_hp' => ['required','string','min:11','max:13'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Ortu::create($validator);
        return redirect()->route('ortu.index')->with('success','Orang Tua berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ortu $ortu)
    {
        return view('ortu.show',compact('ortu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ortu $ortu)
    {
        return view('ortu.edit',compact('ortu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ortu $ortu)
    {
        $validator = Validator::make($request->all(),[
            'nama' => ['required','string','min:8'],
            'username' => ['required','string','min:8','lowercase'],
            'password' => ['required','password','min:8'],
            'no_hp' => ['required','string','min:11','max:13'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Ortu::update($validator->validated());
        return redirect()->route('ortu.index')->with('success','Orang Tua berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ortu $ortu)
    {
        $ortu->delete();
        return redirect()->route('ortu.index')->with('success','Orang Tua berhasil di hapus');
    }
}
