<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\anggota;
use App\Talenta;
use App\Jabatan;
use App\Gerwil;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use PDF;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TalentaController extends Controller
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
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        // $q = Talenta::query();
        // $datas1 = $q->get();

        $talenta = Talenta::get();
        $talenta = Talenta::orderBy('updated_at','desc')->get();
        $anggota   = Anggota::get();
        
        
        // if(Auth::user()->level == 'user') 
        // { 
        //     $datas = Talenta::where('anggota_id', Auth::user()->anggota->id)
        //                         ->get();
        // } else {
        //     $datas = Talenta::get();
        // } 
        // return view('Talenta.index', compact('datas'));
        return view('talenta.index', compact('talenta', 'anggota'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {    
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }     
        $anggotas = anggota::get();
        $anggotas = anggota::orderBy('updated_at','desc')->get();
        

        return view('talenta.create' , compact('anggotas'));
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
            'nama_talenta' => 'required',
        ]); 
        Talenta::create($request->all());

        // if (!empty($request->input('nama_talenta'))) {
        //     $checkbox = join(',' ,$request->input('nama_talenta'));
        //     \DB::table('talentas')->insert(['nama_talenta'=>$checkbox]);
        // } else {
        //     $checkbox = '';
        // }
        
        Session::flash('message', 'Data Pelayanan berhasil ditambahkan!');
        Session::flash('message_type', 'success');

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('talenta.index');
        // return redirect()->back();

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

        $data = Talenta::findOrFail($id);
        return view('Talenta.edit', compact('data'));
    }

     public function show($id)
    {   
        $data = Talenta::findOrFail($id);
    
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        
        $anggotas = anggota::get();

        return view('talenta.show', compact('data', 'anggotas'));
        
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
        Talenta::find($id)->update($request->all());

        Session::flash('message', 'Data Pelayanan berhasil diubah!');
        Session::flash('message_type', 'success');

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('talenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Talenta::find($id)->delete();

        Session::flash('message', 'Data Pelayanan berhasil dihapus!');
        Session::flash('message_type', 'success');

        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('talenta.index');
    }

    public function cetak_pdf($id)
    {
        $talenta = Talenta::find($id);
        $datas = $talenta->get();
        $pdf = PDF::loadView('talenta.laporan', compact('talenta'));
        return $pdf->download('laporan_talenta_'.$talenta->anggota->nama.'.pdf');
        // return view('laporan.kk_pdf');
    }
}
