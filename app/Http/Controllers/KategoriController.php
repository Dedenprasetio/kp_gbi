<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kategori;
// use App\Bank;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
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
        $kategori = Kategori::get(); 
        $datas = kategori::get();
         return view('kategori.index',array('kategori' => $kategori, 'datas' => $datas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }

        $kategori = kategori::get();
        return view('kategori.create', compact('kategori'));

    }

    // public function format()
    // {
    //     $data = [['nama_ktgr' => null, 'bank_id' => null, 'tgl_kategori' => null, 'lokasi' => null, 'jumlah_kategori' => null, 'ket' => null]];
    //         $fileName = 'format-kategori';
            

    //     $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
    //         $excel->sheet('kategori', function($sheet) use($data) {
    //             $sheet->fromArray($data);
    //         });
    //     });

    //     return $export->download('xlsx');
    // }

    // public function import(Request $request)
    // {
    //     $this->validate($request, [
    //         'importkategori' => 'required'
    //     ]);

    //     if ($request->hasFile('importkategori')) {
    //         $path = $request->file('importkategori')->getRealPath();

    //         $data = Excel::load($path, function($reader){})->get();
    //         $a = collect($data);

    //         if (!empty($a) && $a->count()) {
    //             foreach ($a as $key => $value) {
    //                 $insert[] = [
    //                         'nama_ktgr' => $value->nama_ktgr, 
    //                         'bank_id' => $value->bank_id, 
    //                         'tgl_kategori' => $value->tgl_kategori, 
    //                         'lokasi' => $value->lokasi,  
    //                         'jumlah_kategori' => $value->jumlah_kategori, 
    //                         'ket' => $value->ket, 
    //                         'cover' => NULL];

    //                 kategori::create($insert[$key]);
                        
    //                 }
                  
    //         };
    //     }
    //     alert()->success('Berhasil.','Data telah diimport!');
    //     return back();
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nama_ktgr' => 'required|string|max:255',
            
        ]);

        if($request->file('cover')) {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/kategori", $fileName);
            $cover = $fileName;
        } else {
            $cover = NULL;
        }

        kategori::create([
                 
                'nama_ktgr' => $request->get('nama_ktgr'),
                'ket' => $request->get('ket'),
                'cover' => $cover
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('kategori.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(Auth::user()->level == 'user') {
        //         Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //         return redirect()->to('/');
        // }

        $data = kategori::findOrFail($id);
        $kategori = kategori::get();

        return view('kategori.show', compact('data', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // if(Auth::user()->level == 'user') {
        //         Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //         return redirect()->to('/');
        // }

        $data = kategori::findOrFail($id);
        return view('kategori.edit', compact('data'));
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
        if($request->file('cover')) {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/kategori", $fileName);
            $cover = $fileName;
        } else {
            $cover = NULL;
        }

        kategori::find($id)->update([
                'nama_ktgr' => $request->get('nama_ktgr'),
                'ket' => $request->get('ket'),
                'cover' => $cover
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('kategori.index');
    }
}
