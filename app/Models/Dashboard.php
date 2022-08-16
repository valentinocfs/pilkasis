<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    public function allSiswa()
    {
        return DB::table('siswa')->count();
    }

    public function allKandidat()
    {
        return DB::table('kandidat')->count();
    }

    public function allAdmin()
    {
        return DB::table('users')->where('role', 'admin')->count();
    }

    public function voting()
    {
        return DB::table('siswa')->where('voting_token', 0)->count();
    }

    public function dataKandidat()
    {
        return DB::table('kandidat')->get();
    }
    
}
