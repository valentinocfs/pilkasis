<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kandidat extends Model
{

    protected $table = 'kandidat';
    protected $fillable = ['nama', 'nokandidat', 'visi', 'misi', 'suara', 'created_at', "updated_at"];

    public function allData()
    {
        return DB::table('kandidat')->get();
    }

    public function addData($data)
    {
        DB::table('kandidat')->insert($data);
    }

    public function getById($id)
    {
        return DB::table('kandidat')->where('id', $id)->first();
    }

    public function deleteData($id)
    {
        DB::table('kandidat')->where('id', $id)->delete();
    }

    public function updateData($id, $data)
    {
        DB::table('kandidat')->where('id', $id)->update($data);
    }
}
