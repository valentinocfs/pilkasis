<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('sukses')) {
                Alert::toast(session('sukses'), 'success');
            } else if (session('gagal')) {
                Alert::toast(session('gagal'), 'error');
            }

            return $next($request);
        });

        $this->KandidatModel = new Kandidat;
    }

    public function index()
    {
        $data_kandidat = Kandidat::orderBy('nokandidat')->get();

        $data_siswa = Siswa::where("nis", auth()->user()->nis)->first();

        return view('home', [
            'data_kandidat' => $data_kandidat,
            'data_siswa' => $data_siswa
        ]);
    }

    public function add($id)
    {
        $siswa = Siswa::where("nis", auth()->user()->nis)->first();

        if ($siswa) {
            if ($siswa->voting_token >= 1) {
                Siswa::where('nis', auth()->user()->nis)->update([
                    'voting_token' => $siswa->voting_token - 1,
                ]);

                $kandidat = Kandidat::where('nokandidat', $id)->first();

                Kandidat::where('nokandidat', $id)->update([
                    'suara' => $kandidat->suara + 1,
                ]);

                return redirect('/')->with('sukses', 'Berhasil memilih kandidat No. ' . $id);
            } else {
                return redirect('/')->with('gagal', 'Gagal memilih kandidat No. ' . $id);
            }
        } else {
            return redirect('/')->with('gagal', 'Gagal memilih kandidat No. ' . $id);
        }
    }

    public function profile()
    {
        $data_siswa = Siswa::where("nis", auth()->user()->nis)->first();

        return view("profile", [
            "data_siswa" => $data_siswa
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = User::where('nis', auth()->user()->nis)->first();

        $validator = Validator::make($request->all(), [
            'password_old' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__("Kata sandi yang anda masukkan salah!"));
                }
            }],
            'password' => 'required|min:8|required_with:password_confirm|same:password_confirm',
            'password_confirm' => 'required'
        ], [
            'password_old.required' => 'Kata sandi tidak boleh kosong',
            'password.required' => 'Kata sandi tidak boleh kosong',
            'password_confirm.required' => 'Kata sandi tidak boleh kosong',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password.required_with' => 'Kata sandi harus sesuai',
            'password.same' => 'Kata sandi harus sesuai'
        ]);

        if ($validator->fails()) {
            return redirect('/profile')
                ->withErrors($validator)
                ->withInput()
                ->with('gagal', 'Kata sandi gagal diubah.');
        }

        $changePassword = User::where('nis', auth()->user()->nis)->update([
            'password' => bcrypt($request->password)
        ]);

        if (!$changePassword) {
            return redirect('/profile')
                ->withErrors($validator)
                ->withInput()
                ->with('gagal', 'Kata sandi gagal diubah.');
        } else {
            return redirect('/profile')->with('sukses', 'Kata sandi berhasil diubah.');
        }
    }
}
