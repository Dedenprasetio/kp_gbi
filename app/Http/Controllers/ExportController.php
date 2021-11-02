<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use PDF;
use App\KartuKeluarga;
use App\Anggota;
use RealRashid\SweetAlert\Facades\Alert;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        // if(Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }
        $q = KartuKeluarga::query();
        $datas1 = $q->get();

        $kk = KartuKeluarga::get();
        $anggotas   = Anggota::get();

        return view('export.index', compact('kk', 'anggotas', 'datas1'));
    }
   
  //TAG TUTUP  
}

