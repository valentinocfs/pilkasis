<?php

namespace App\Http\Livewire;

use App\Models\Siswa;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Search extends Component
{
    use WithPagination;
    public $searchTerm;
    public $currentPage = 1;

    protected $listeners = ['delete'];

    public function __construct()
    {
        if (session('sukses')) {
            Alert::toast(session('sukses'), 'success');
        } else if (session('gagal')) {
            Alert::toast(session('gagal'), 'error');
        }
    }

    
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $data_siswa = Siswa::where('nama', 'LIKE', $searchTerm)
        ->orWhere('nis', 'LIKE', $searchTerm)
        ->orWhere('kelas', 'LIKE', $searchTerm)
        ->Paginate(5);
        return view('livewire.search', ['data_siswa' => $data_siswa]);
    }
    
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function() {
            return $this->currentPage;
        });
    }
    
    public function deleteConfirm($id, $nama)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Yakin ?',
            'text' => 'Hapus data '. $nama .' ?',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        Siswa::where('id', $id)->delete();
    }
}
