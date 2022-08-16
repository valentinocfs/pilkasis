<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {  
        if (Auth::attempt($request->only('nis', 'password'))) {
            return redirect('/');
        }
        return redirect('/login')->with('message', 'NIS atau Password salah !!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $check = $this->create($data);

        if (Auth::user()) {
            return redirect('/dashboard')->with('sukses', 'Akun berhasil dibuat');
        }

        if (Auth::attempt($request->only('nis', 'password'))) {
            return redirect('/dashboard')->with('sukses', 'Akun berhasil dibuat');
        }
        return redirect('/login');
    }

    public function create(array $data)
    {
        return User::create([
            'role' => 'admin',
            'name' => $data['nama'],
            'nis' => $data['nis'],
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(60)
        ]);
    }
}
