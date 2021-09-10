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
        $anggotas   = Anggota::get();
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
         
        
        Anggota::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
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
        Anggota::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('anggota.index');
    }
}
