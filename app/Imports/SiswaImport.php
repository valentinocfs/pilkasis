<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class SiswaImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        $validatorErrors = Validator::make($collection->toArray(), $this->rules(), $this->validationMessage() )->validate();

        foreach ($collection as $row) {
            Siswa::create([
                'user_id' => null,
                'nama' => $row[1],
                'nis' => $row[2],
                'kelas' => $row[3],
                'jenis_kelamin' => $row[4]
            ]);
            User::create([
                'role' => 'siswa',
                'name' => $row[1],
                'nis' => $row[2],
                'password' => Hash::make($row[2]),
                'remember_token' => Str::random(60)
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.1' => 'required',
            '*.2' => 'required|unique:siswa,nis',
            '*.3' => 'required',
            '*.4' => 'required',
        ];
    }

    public function validationMessage()
    {
        return [
            '*.1.required' => 'Kolom nama tidak boleh kosong',
            '*.2.unique' => 'Kolom nis sudah terdaftar',
            '*.2.required' => 'Kolom nis tidak boleh kosong',
            '*.3.required' => 'Kolom kelas tidak boleh kosong',
            '*.4.required' => 'Kolom jenis kelamin tidak boleh kosong'
        ];
    }
}
