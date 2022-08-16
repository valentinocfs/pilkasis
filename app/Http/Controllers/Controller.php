<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session('sukses')) {
                Alert::toast(session('sukses'), 'success');
        } else if (session('gagal')) {
                Alert::toast(session('gagal'), 'error');
        }
        
        return $next($request);
        });
    }
}
