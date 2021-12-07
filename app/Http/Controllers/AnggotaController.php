<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Anggota;
use App\Talenta;
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


class AnggotaController extends Controller
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
        //Selain admin dilarang akses 
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        } 
        $talentas  = Talenta::get();
        $anggotas   = Anggota::orderBy('updated_at', 'desc')->get();
        return view('anggota.index',array('anggota' => $anggotas,   'talenta' => $talentas));
  
    }


    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        
        //MENGITUNG KODE ANGGOTA SECARA OTOMATIS
        $getRow = Anggota::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "NIAGBIN00001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "NIAGBIN0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "NIAGBIN000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "NIAGBIN00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "NIAGBIN0".''.($lastId->id + 1);
            } else {
                    $kode = "NIAGBIN".''.($lastId->id + 1);
            }
        }
 
        // $users = User::WhereNotExists(function($query) {
        //                 $query->select(DB::raw(1))
        //                 ->from('anggota')
        //                 ->whereRaw('anggota.user_id = users.id');
        //              })->get();

        $talentas = Talenta::get();
        $anggotas = Anggota::get();

        return view('anggota.create', compact('kode',  'talentas', 'anggotas'));

    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $count = Anggota::where('kode_anggota',$request->input('kode_anggota'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('anggota');
        }

        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'gerwil' => 'required',
            
        ]);

        

        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gambar')->move("images/anggota", $fileName);
            $gambar = $fileName;
        }
         
        
        // Anggota::create($request->all());
        Anggota::create([
            'kode_anggota' => $request->input('kode_anggota'),
            'nama' => $request->input('nama'),
            'tgl_baptis' => $request->input('tgl_baptis'),
            // 
            'grj_baptis' => $request->input('grj_baptis'),
            'asal_grj' => $request->input('asal_grj'),
            'kota' => $request->input('kota'),
            'kelurahan' => $request->input('kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'provinsi' => $request->input('provinsi'),
            'alamat' => $request->input('alamat'),
            // 
            'jk' => $request->input('jk'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'gerwil' => $request->input('gerwil'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'sts_dlm_klrg' => $request->input('sts_dlm_klrg'),
            'alamat_domisili' => $request->input('alamat_domisili'),
            'kelurahan_domisili' => $request->input('kelurahan_domisili'),
            'kecamatan_domisili' => $request->input('kecamatan_domisili'),
            'kota_domisili' => $request->input('kota_domisili'),
            'provinsi_domisili' => $request->input('provinsi_domisili'),
            'pendidikan' => $request->input('pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'goldar' => $request->input('goldar'),
            'ayah' => $request->input('ayah'),
            'ibu' => $request->input('ibu'),
            'hp' => $request->input('hp'),
            'sts_anggota' => $request->input('sts_anggota'),
            'pekerjaan' => $request->input('pekerjaan'),
            'gambar' => $gambar
        ]);

        Session::flash('message', 'Data Anggota berhasil ditambahkan!');
        Session::flash('message_type', 'success');

        return redirect()->route('anggota.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        $data = anggota::findOrFail($id);
       
        return view('Anggota.show', compact('data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Anggota::findOrFail($id);
        return view('anggota.edit', compact('data'));
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
        
        $anggota = Anggota::find($id);
        
        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gambar')->move("images/anggota", $fileName);
            $anggota->gambar = $fileName;
        }

        $anggota->nama = $request->input('nama');
        $anggota->alamat = $request->input('alamat');
        $anggota->gerwil = $request->input('gerwil');
        $anggota->sts_dlm_klrg = $request->input('sts_dlm_klrg');
        $anggota->sts_pernikahan = $request->input('sts_pernikahan');
        $anggota->sts_anggota = $request->input('sts_anggota');
        $anggota->pekerjaan = $request->input('pekerjaan');
        $anggota->hp = $request->input('hp');

        $anggota->update();

        Session::flash('message', 'Data Anggota berhasil diubah!');
        Session::flash('message_type', 'success');

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
        Anggota::find($id)->delete();

        Session::flash('message', 'Data Anggota berhasil dihapus!');
        Session::flash('message_type', 'success');

        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('anggota.index');
    }

    public function cetak_pdf($id)
    {
        $anggota = Anggota::find($id);
        $datas = $anggota->get();
        $pdf = PDF::loadView('anggota.laporan', compact('anggota'));
        return $pdf->download('laporan_anggota_'.$anggota->nama.'.pdf');
        // return view('laporan.kk_pdf');
    }
}

