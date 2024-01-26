<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.mahasiswa', [
            'title' => 'Mahasiswa',
            'data' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentNIM = User::orderBy('nim', 'desc')->first();
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'telepon' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required'
        ]);
        $validated['nim'] = $currentNIM->nim + 1;
        $validated['password'] = Hash::make($request->password);
        $validated['status'] = 1;

        User::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $mahasiswa)
    {
        $mahasiswa->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->back();
    }
}
