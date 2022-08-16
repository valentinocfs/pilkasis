<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->DashboardModel = new Dashboard;
    }

    public function index()
    {

       $data = [
            'siswa' => $this->DashboardModel->allSiswa(),
            'kandidat' => $this->DashboardModel->allKandidat(),
            'admin' => $this->DashboardModel->allAdmin(),
            'voting' => $this->DashboardModel->voting(),
            'dataKandidat' => $this->DashboardModel->dataKandidat(),

        ]; 

        $categories = [];
        $dataSuara = [];

        foreach ($data['dataKandidat'] as $kandidat){
            $categories[] = $kandidat->nama;
            $dataSuara[] = $kandidat->suara;
        }

        return view('dashboard.index', $data, ['categories' => $categories, 'dataSuara' => $dataSuara]);
    }
}
