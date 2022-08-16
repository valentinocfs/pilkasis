<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis',
            'kelas' => 'required',
            'jenis_kelamin' => 'required'
        ],[
            'nama.required' => 'Nama tidak boleh kosong ',
            'nis.required' => 'NIS tidak boleh kosong ',
            'nis.unique' => 'NIS sudah terdaftar ',
            'kelas.required' => 'Kelas tidak boleh kosong ',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong'
        ]);

        if ($validator->fails()) {
            return redirect('/siswa')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('gagal', 'Data gagal ditambahkan.');
        }


        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->nis = $request->nis;
        $user->password = bcrypt($request->nis);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);

        $siswa = Siswa::create($request->all());

        return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan.');
        
    }
    
    public function edit(Siswa $siswa)
    {   
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required'
        ],[
            'nama.required' => 'Nama tidak boleh kosong ',
            'nis.required' => 'NIS tidak boleh kosong ',
            'kelas.required' => 'Kelas tidak boleh kosong ',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong'
        ]);

        if ($validator->fails()) {
            return redirect('/siswa/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('gagal', 'Data gagal diubah.');
        }

        $siswa = Siswa::find($id);
        $data = $request->all();

        $siswa->update($data);

        User::where('id',$data['user_id'])->update([
            'name' => $data['nama'],
            'nis' => $data['nis']
        ]);

        return redirect('/siswa')->with('sukses', 'Data berhasil diubah.');
    }

    public function importexcel(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,xls,xlsx',
        ],[
            'file.required' => 'Harus menyertakan file',
            'file.mimes' => 'Tipe file harus : .csv, .xls, .xlsx'
        ]);
        
        if ($validator->fails()) {
            return redirect('/siswa')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('gagal', 'Data gagal diimport.');
        }

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        $file->move('file_siswa', $nama_file);

        Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

        return redirect('/siswa')->with('sukses', 'Data berhasil diimport.');
    }
}
