<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Anggota;
use App\Talenta;
use App\KartuKeluarga;
use App\DetailKartuKeluarga;
// use App\Jabatan;
// use App\Gerwil;
// use App\TransNikah;
use Carbon\Carbon;
use Session;    
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use App\Istri;
use RealRashid\SweetAlert\Facades\Alert;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;


class detKkController extends Controller
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
        // $det = DetailKartuKeluarga::findOrFail($id);
        //Selain admin dilarang akses 
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $q = DetailKartuKeluarga::query();
        $datas1 = $q->get();

        $kk = KartuKeluarga::get();
        $det = DetailKartuKeluarga::get();
        $anggota   = Anggota::get();
        
        
        return view('detailkk.index', compact('det', 'kk', 'anggota', 'datas1'));
  
    }

    public function tampil_detkk($id)
    {
        $data = KartuKeluarga::findOrFail($id);
        $kk = DetailKartuKeluarga::get();
        
        $det = DetailKartuKeluarga::join('kartu_keluargas', 'kartu_keluargas.id', '=' , 'detail_kartu_keluarga.kartukeluarga_id')
        ->join('anggota', 'anggota.id', '=' , 'detail_kartu_keluarga.anggota_id')
        ->where('kartukeluarga_id', $id)
        ->get(['anggota.nama','anggota.sts_dlm_klrg','anggota.id']);

        $istri = Istri::join('kartu_keluargas', 'kartu_keluargas.id', '=' , 'istri.kartukeluarga_id')
        ->join('anggota', 'anggota.id', '=' , 'istri.istri_id')
        ->where('kartukeluarga_id', $id)
        ->get(['anggota.nama','anggota.sts_dlm_klrg']);

        return view('detailkk.index', compact('det','data','kk','istri'));
    }


    public function tambah_kk($id)
    {
        $det = DetailKartuKeluarga::join('kartu_keluargas', 'kartu_keluargas.id', '=' , 'detail_kartu_keluarga.kartukeluarga_id')
        ->join('anggota', 'anggota.id', '=' , 'detail_kartu_keluarga.anggota_id')
        ->where('kartukeluarga_id', $id)
        ->get(['anggota.nama','anggota.sts_dlm_klrg','anggota.id']);

        $dt = DetailKartuKeluarga::where([
            ['kartukeluarga_id', '=', 'kartu_keluargas.id']
        ])->get();

        $data = KartuKeluarga::findOrFail($id);

        $kk = KartuKeluarga::get();
        
        $anggotas = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('detail_kartu_keluarga')
            ->whereRaw('detail_kartu_keluarga.anggota_id = anggota.id');
         })->get();

         return view('detailkk.create' , compact('anggotas','kk','det','dt','data'));
    }

    public function tambah_istri()
    {
        $kk = KartuKeluarga::get();
        
        $anggotas = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('detail_kartu_keluarga')
            ->whereRaw('detail_kartu_keluarga.anggota_id = anggota.id');
         })->get();

         return view('detailkk.istri' , compact('anggotas','kk','det','dt','data'));
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
            'anggota_id' => 'required',
            'kartukeluarga_id' => 'required'
            
        ]); 
        DetailKartuKeluarga::create($request->all());


        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('kk.index');

    }

    // public function buat($id)
    // {
    //     $data = KartuKeluarga::findOrfail($id);
    //     $anggotas = Anggota::get();
    //     $anggotas = Anggota::WhereNotExists(function($query) {
    //         $query->select(DB::raw(1))
    //         ->from('detail_kartu_keluarga')
    //         ->whereRaw('detail_kartu_keluarga.anggota_id = anggota.id');
    //      })->get();
    //     return view('detailkk.create' , compact('anggotas','data'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        $data = DetailKartuKeluarga::findOrFail($id);
    
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        
        $anggotas = Anggota::get();
        $det = DetailKartuKeluarga::get();

        return view('detailkk.show', compact('data', 'anggotas','det'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = DetailKartuKeluarga::findOrFail($id);
        return view('detailkk.edit', compact('data'));
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
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        
        Anggota::find($id)->update($request->all());
        
        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gambar')->move("images/anggota", $fileName);
            //$upload_image = $request->myimage->store('anggota');
            $gambar = $fileName;
        }

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        DetailKartuKeluarga::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('kk.index');
    }

    public function hapus($detkk_id)
    {
        try {
            $detkk = DetailKartuKeluarga::where('id',$detkk_id)->first();
          } catch (ModelNotFoundException $e) {
            return redirect()->route('kk.index')->with(['Gaga;'=> 'Failed']);
          }
        // $detkk =DetailKartuKeluarga::where('id',$detkk_id)->find();
        $detkk->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('kk.index');
    }
}
