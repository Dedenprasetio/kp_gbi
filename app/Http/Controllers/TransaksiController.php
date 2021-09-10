<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\kategori;
// use App\anggota;
use App\Transaksi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
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

        $q = Transaksi::query();
        
        $transaksi = Transaksi::get();
        $kategori      = kategori::get();
        return view('transaksi.index', compact('transaksi', 'kategori'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $getRow = Transaksi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "GN00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "GN0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "GN000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "GN00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "GN0".''.($lastId->id + 1);
            } else {
                    $kode = "GN".''.($lastId->id + 1);
            }
        }

        
        $kategoris = kategori::get();
        return view('transaksi.create', compact('kategoris', 'kode'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->file('bukti')) {
            $file = $request->file('bukti');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('bukti')->move("images/kategori", $fileName);
            $bukti = $fileName;
        } else {
            $bukti = NULL;
        }

        Transaksi::create($request->all());

        $transaksi->kategori->where('id', $transaksi->kategori_id)
                        ->update([
                            'nominal' => ($transaksi->kategori->nominal - 1),
                            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('transaksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Transaksi::findOrFail($id);

        $kategoris = kategori::where('nominal', '>', 0)->get();
        $kode = Transaksi::get();
        return view('transaksi.edit1', compact('kategoris','data', 'kode'));
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
        if($request->file('bukti')) {
            $file = $request->file('bukti');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('bukti')->move("images/kategori", $fileName);
            $bukti = $fileName;
        } else {
            $bukti = NULL;
        }
        $transaksi = Transaksi::find($id);

        $transaksi->update([
                'status' => 'lunas'
                ]);

        $transaksi->kategori->where('id', $transaksi->kategori->id)
                        ->update([
                            'nominal' => ($transaksi->kategori->nominal + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('transaksi.index');
    }

    //TAMBAHAN
    public function edit1($id)
    {   
        
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Transaksi::findOrFail($id);
        $users = User::get();
        return view('transaksi.edit', compact('data', 'users'));
    }

    public function update1(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->update([
                'status' => 'lunas'
                ]);

        $transaksi->kategori->where('id', $transaksi->kategori->id)
                        ->update([
                            'nominal' => ($transaksi->kategori->nominal + 1),
                            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('transaksi.index');
    }
}
