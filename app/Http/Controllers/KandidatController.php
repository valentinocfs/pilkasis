<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class KandidatController extends Controller
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

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_kandidat = Kandidat::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_kandidat = Kandidat::orderBy('nokandidat')->paginate(5);
        }

        return view('kandidat.index', ['data_kandidat' => $data_kandidat]);
    }

    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nokandidat' => 'required|unique:kandidat,nokandidat|max:2',
            'visi' => 'required',
            'misi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:2048'
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'nokandidat.required' => 'Nomor Kandidat tidak boleh kosong',
            'nokandidat.unique' => 'Nomor kandidat sudah terdaftar',
            'nokandidat.max' => 'Nomor kandidat maksimal 2 karakter',
            'visi.required' => 'Visi tidak boleh kosong',
            'misi.required' => 'Misi tidak boleh kosong',
            'foto.required' => 'Harus menyertakan foto kandidat',
            'foto.mimes' => 'Tipe file harus : .jpg, .jpeg, .png',
            'foto.max' => 'Ukuran foto maksimal : 2mb'
        ]);

        if ($validator->fails()) {
            return redirect('/kandidat')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('gagal', 'Data gagal ditambahkan.');
        }

        $file = Request()->foto;
        $fileName = Request()->nokandidat . '.' . $file->extension();
        $file->move(public_path('img'), $fileName);

        $data = [
            'nama' => Request()->nama,
            'nokandidat' => Request()->nokandidat,
            'visi' => Request()->visi,
            'misi' => Request()->misi,
            'foto' => $fileName
        ];

        $this->KandidatModel->addData($data);
        return redirect('/kandidat')->with('sukses', 'Data berhasil ditambahkan.');
    }

    public function delete($id)
    {

        $kandidat = $this->KandidatModel->getById($id);
        if ($kandidat->foto <> "") {
            unlink(public_path('img') . '/' . $kandidat->foto);
        }

        $this->KandidatModel->deleteData($id);
        return redirect('/kandidat')->with('sukses', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $data = [
            'kandidat' => $this->KandidatModel->getById($id)
        ];

        return view('kandidat.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nokandidat' => 'required|max:2',
            'visi' => 'required',
            'misi' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'nokandidat.required' => 'Nomor Kandidat tidak boleh kosong',
            'nokandidat.max' => 'Nomor kandidat maksimal 2 karakter',
            'visi.required' => 'Visi tidak boleh kosong',
            'misi.required' => 'Misi tidak boleh kosong',
            'foto.mimes' => 'Tipe file harus : .jpg, .jpeg, .png',
            'foto.max' => 'Ukuran foto maksimal : 2mb'
        ]);

        if ($validator->fails()) {
            return redirect('/kandidat/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('gagal', 'Data gagal diubah.');
        }

        if (Request()->foto <> "") {
            // jika ingin ganti foto
            $file = Request()->foto;
            $fileName = Request()->nokandidat . '.' . $file->extension();
            $file->move(public_path('img'), $fileName);

            $data = [
                'nama' => Request()->nama,
                'nokandidat' => Request()->nokandidat,
                'visi' => Request()->visi,
                'misi' => Request()->misi,
                'foto' => $fileName
            ];
        } else {

            $data = [
                'nama' => Request()->nama,
                'nokandidat' => Request()->nokandidat,
                'visi' => Request()->visi,
                'misi' => Request()->misi,
            ];
        }

        $this->KandidatModel->updateData($id, $data);
        return redirect('/kandidat/'.$id.'/edit')->with('sukses', 'Data Berhasil Diubah');
    }
}
