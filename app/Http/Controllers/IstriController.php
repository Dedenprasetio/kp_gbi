<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Istri;
use App\Anggota;
use App\KartuKeluarga;
use Carbon\Carbon;
use Session;    
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class IstriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function tambah_istri($id)
    {
        $data = KartuKeluarga::findOrFail($id);

        $kk = KartuKeluarga::get();   
        
        $istris = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('istri')
            ->whereRaw('istri.istri_id = anggota.id', );
         })->get();

         return view('istri.create' , compact('istris','kk','data'));
    }

    public function updateStatus(Request $request)
    {
        $kk = KartuKeluarga::findOrFail($request->id);
        $kk->sts_istri = $request->sts_istri;
        $kk->save();

        return response()->json(['message' => 'Status istri sudah disetujui. Klik SIMPAN']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [     
            'istri_id' => 'required',
            'kartukeluarga_id' => 'required',
        ]); 
        Istri::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('kk.index');
    }

    public function simpan_istri(Request $request)
    {
        $this->validate($request, [     
            'istri_id' => 'required',
            'kartukeluarga_id' => 'required'
            
        ]); 
        Istri::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('kk.index');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
