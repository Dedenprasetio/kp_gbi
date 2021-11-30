<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Anggota;
use App\Talenta;
use App\KartuKeluarga;
use App\DetailKartuKeluarga;
use App\Istri;
// use App\Jabatan;
// use App\Gerwil;
// use App\TransNikah;
use Carbon\Carbon;
use Session;    
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;


class kkController extends Controller
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

    public function index(Request $request)
    {
        //Selain admin dilarang akses 
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $q = KartuKeluarga::query();
        $datas1 = $q->get();
        
        

        $kk = KartuKeluarga::get();
        $anggota   = Anggota::get();

        $istri = Istri::join('kartu_keluargas', 'kartu_keluargas.id', '=' , 'istri.kartukeluarga_id')
        ->join('anggota', 'anggota.id', '=' , 'istri.istri_id')
        ->where('kartukeluarga_id')
        ->get(['anggota.nama','anggota.sts_dlm_klrg']);
        
        return view('kk.index', compact('kk', 'anggota', 'datas1','istri'));
  
    }

    public function sts_istri($id)
    {
        $data = KartuKeluarga::where('id',$id)->first();

        $status_sekarang = $data->sts_istri;

        if($status_sekarang == 1)
        {
            KartuKeluarga::where('id',$id)->update(
                ['sts_istri'=>0]
            );
        }
        else
        {
            KartuKeluarga::where('id',$id)->update(
                ['sts_istri'=>1]
            );
        }

        return redirect()->route('kk.index');
    }
    
    public function create()
    {
       
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        } 

        //MENGITUNG NOMOR KK SECARA OTOMATIS
        // $getRow = KartuKeluarga::orderBy('id', 'DESC')->get();
        // $rowCount = $getRow->count();
        // $lastId = $getRow->first();
        // $kode = "KKGN00001";
        // if ($rowCount > 0) {
        //     if ($lastId->id < 9) {
        //             $kode = "KKGN0000".''.($lastId->id + 1);
        //     } else if ($lastId->id < 99) {
        //             $kode = "KKGN000".''.($lastId->id + 1);
        //     } else if ($lastId->id < 999) {
        //             $kode = "KKGN00".''.($lastId->id + 1);
        //     } else if ($lastId->id < 9999) {
        //             $kode = "KKGN0".''.($lastId->id + 1);
        //     } else {
        //             $kode = "KKGN".''.($lastId->id + 1);
        //     }
        // }


        
        
                    $anggotas = Anggota::WhereNotExists(function($query) {
                        $query->select(DB::raw(1))
                        ->from('kartu_keluargas')
                        ->whereRaw('kartu_keluargas.anggota_id = anggota.id' );
                     })->get();

                     $istris = Anggota::WhereNotExists(function($query) {
                        $query->select(DB::raw(1))
                        ->from('istri')
                        ->whereRaw('istri.istri_id = anggota.id');
                     })->get();

        //$anggotas = anggota::get();
        

        return view('kk.create' , compact('anggotas','istris'));

    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $count = KartuKeluarga::where('nomor_kk',$request->input('nomor_kk'))->count();

        $this->validate($request, [
           
            'anggota_id' => 'required',
            'nomor_kk' => 'required',
            'tempat' => 'required',
            'alamat' => 'required',
            'oleh' => 'required',
            'jam_nikah' => 'required',
            'jam_sipil' => 'required',
            'tgl_nikah' => 'required',
        ]); 
        KartuKeluarga::create($request->all());
        
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
        
        $data = KartuKeluarga::findOrFail($id);
        $datakk = DetailKartuKeluarga::find('id');
        $anggotas = anggota::get();
        $dt = DetailKartuKeluarga::where([
            ['id']
        ])->get();

        
    
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        // $kk = KartuKeluarga::get();
        // $anggotas = Anggota::get();
        $det = DetailKartuKeluarga::join('kartu_keluargas', 'kartu_keluargas.id', '=' , 'detail_kartu_keluarga.kartukeluarga_id')
        ->join('anggota', 'anggota.id', '=' , 'detail_kartu_keluarga.anggota_id')
        ->where('kartukeluarga_id', $id)
        ->get(['anggota.nama','anggota.sts_dlm_klrg']);

        return view('kk.show', compact('det','data','dt','anggotas'));
    }

    public function cetak_pdf($id)
    {   
        
        $data = KartuKeluarga::findOrFail($id);

    
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        // $kk = KartuKeluarga::get();
        // $anggotas = Anggota::get();
        $det = DetailKartuKeluarga::join('kartu_keluargas', 'kartu_keluargas.id', '=' , 'detail_kartu_keluarga.kartukeluarga_id')
        ->join('anggota', 'anggota.id', '=' , 'detail_kartu_keluarga.anggota_id')
        ->where('kartukeluarga_id', $id)
        ->get(['anggota.nama','anggota.sts_dlm_klrg']);
        
        $pdf = PDF::loadView('laporan.kk_pdf', compact('det','datas'));
        return $pdf->download('laporan_kk_'.date('Y-m-d_H-i-s').'.pdf');
        
    }

    public function cetak_pernikahan($id)
    {   
        
        $data = KartuKeluarga::findOrFail($id);

    
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        // $kk = KartuKeluarga::get();
        // $anggotas = Anggota::get();
        $det = DetailKartuKeluarga::join('kartu_keluargas', 'kartu_keluargas.id', '=' , 'detail_kartu_keluarga.kartukeluarga_id')
        ->join('anggota', 'anggota.id', '=' , 'detail_kartu_keluarga.anggota_id')
        ->where('kartukeluarga_id', $id)
        ->get(['anggota.nama','anggota.sts_dlm_klrg']);
        
        $pdf = PDF::loadView('laporan.pernikahan', compact('det','data'));
        return $pdf->download('buku_pernikahan'.date('Y-m-d_H-i-s').'.pdf');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = KartuKeluarga::findOrFail($id);
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('kk.edit', compact('data'));
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
        KartuKeluarga::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('kk');
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
        KartuKeluarga::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('kk.index');
    }
}
