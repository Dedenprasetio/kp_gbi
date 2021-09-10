<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\User;
use App\Talenta;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas  = Anggota::count(); 
        $user      = User::get();
        $talentas  = Talenta::get();
        $anggota   = Anggota::get();

        //menyiapkan data untuk chart
        $categories= [];
        $data= [];

        foreach($anggota as $agt){
            $categories[] = $agt->gerwil;
            $data[] = $anggotas;
        }

        //dd($categories);

        return view('layouts.dashboard',array( 'data' => $data ,'categories' => $categories,'talenta' => $talentas, 'anggota' => $anggota, 'anggotas' => $anggotas,   'user' => $user));
    
        

    }
}
    