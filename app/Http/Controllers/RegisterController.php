<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register()
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

        return redirect('/dashboard');
    }
}
