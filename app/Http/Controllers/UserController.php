<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required','string','max:30'],
            'username' => ['required','string','max:30','min:8','lowercase'],
            'password' => ['required','password','min:8'],
            'role' => ['required'],
            'face_encoding' => ['sometimes'],
            'no_hp' => ['sometimes'],
            'id_ortu' => ['sometimes'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::create($validator->validated());
        return redirect()->route('user.index')->with('success','User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        return view('user.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        return view('user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required','string','max:30'],
            'username' => ['required','string','max:30','min:8','lowercase'],
            'password' => ['required','password','min:8'],
            'role' => ['required'],
            'face_encoding' => ['sometimes'],
            'no_hp' => ['sometimes'],
            'id_ortu' => ['sometimes'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $User->update($validator->validated());
        return redirect()->route('user.index')->with('success','User berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        $User->delete();
        return redirect()->route('user.index')->with('success','User telah terhapus');
    }
}
