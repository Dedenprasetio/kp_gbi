<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\acara;
use App\Anggota;
use App\Gerwil;
use App\Talenta;
use App\Transaksi;
use App\KartuKeluarga;
use App\DetailKartuKeluarga;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
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

    //EXPORT ACARA
    public function acara()
    {
        return view('laporan.acara');
    }

    public function acaraPdf()
    {

        $datas = acara::all();
        $pdf = PDF::loadView('laporan.acara_pdf', compact('datas'));
        return $pdf->download('laporan_acara_'.date('Y-m-d_H-i-s').'.pdf');
    }

    // EXPORT TALENTA
    public function talentaPdf(Request $request)
    {
        $q = Talenta::query();
        
        
        if($request->get('nama_talenta')) 
        {
            

            if($request->get('nama_talenta') == 'Khotbah') {
                $q->where('nama_talenta', 'Khotbah');
            } elseif($request->get('nama_talenta') == 'Pengajar') {
                $q->where('nama_talenta', 'Pengajar');
            } elseif($request->get('nama_talenta') == 'Pendoa') {
                $q->where('nama_talenta', 'Pendoa');
            } elseif($request->get('nama_talenta') == 'Konselor') {
                $q->where('nama_talenta', 'Konselor');
            } elseif($request->get('nama_talenta') == 'Musik') {
                $q->where('nama_talenta', 'Musik');
            } elseif($request->get('nama_talenta') == 'Singer') {
                $q->where('nama_talenta', 'Singer');
            } elseif($request->get('nama_talenta') == 'Worship Leader') {
                $q->where('nama_talenta', 'Worship Leader');
            } elseif($request->get('nama_talenta') == 'Multimedia') {
                $q->where('nama_talenta', 'Multimedia');
            }
            
        }

        if(Auth::user()->level == 'user')
        {
            $q->where('anggota_id', Auth::user()->Anggota->id);
        }

        $datas = $q->get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.talenta_pdf', compact('datas'));
       return $pdf->download('laporan_talenta_'.date('Y-m-d_H-i-s').'.pdf');
    }
    
    //EXPORT KK
    public function kk()
    {
        return view('laporan.kk');
    }

    public function kkPdf($id)
    {
        $data = KartuKeluarga::findOrFail($id);

        $det = DetailKartuKeluarga::join('kartu_keluargas', 'kartu_keluargas.id', '=' , 'detail_kartu_keluarga.kartukeluarga_id')
        ->join('anggota', 'anggota.id', '=' , 'detail_kartu_keluarga.anggota_id')
        ->where('kartukeluarga_id', $id)
        ->get(['anggota.kode_anggota','anggota.jk','anggota.gerwil','anggota.tgl_lahir','anggota.sts_anggota','anggota.nama','anggota.sts_dlm_klrg']);
        
        $pdf = PDF::loadView('laporan.kk_pdf', compact('det','data'));
        return $pdf->download('laporan_kk_'.$data->anggota->nama.'.pdf');
    }



    // EXPORT TRANSAKSI
    public function transaksi()
    {

        return view('laporan.transaksi');
    }


    public function transaksiPdf(Request $request)
    {
        $q = Transaksi::query();

        if($request->get('status')) 
        {
             if($request->get('status') == 'belum') {
                $q->where('status', 'belum');
            } else {
                $q->where('status', 'lunas');
            }
        }

        if(Auth::user()->level == 'user')
        {
            $q->where('anggota_id', Auth::user()->Anggota->id);
        }

        $datas = $q->get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.transaksi_pdf', compact('datas'));
       return $pdf->download('laporan_transaksi_'.date('Y-m-d_H-i-s').'.pdf');
    }

    //exsport Anggota DAN SIMPATISAN
    public function anggota()
    {

        return view('laporan.anggota');
    }

    public function anggotaPdf(Request $request)
    {
        $q = Anggota::query();

        if($request->get('sts_anggota')) 
        {
            

            if($request->get('sts_anggota') == 'jemaat') {
                $q->where('sts_anggota', 'jemaat');
            } else {
                $q->where('sts_anggota', 'simpatisan');
            }
            
        }

        if(Auth::user()->level == 'user')
        {
            $q->where('anggota_id', Auth::user()->Anggota->id);
        }

        $datas = $q->get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.anggota_pdf', compact('datas'));
       return $pdf->download('laporan_anggota_'.date('Y-m-d_H-i-s').'.pdf');
    }

    //GERWIL EXPORT
    public function gerwil()
    {

        return view('laporan.gerwil');
    }

    public function gerwilPdf(Request $request)
    {
        $q = Anggota::query();


        if($request->get('gerwil')) 
        {
            if($request->get('gerwil') == 'Tengah') 
            {
                $q->where('gerwil', 'Tengah');
            }  
            elseif($request->get('gerwil') == 'Timut') 
            {
                $q->where('gerwil', 'Timur');
            } 
            elseif($request->get('gerwil') == 'Barat') 
            {
                $q->where('gerwil', 'Barat');
            }
            elseif($request->get('gerwil') == 'Selatan') 
            {
                $q->where('gerwil', 'Selatan');
            }
            elseif($request->get('gerwil') == 'Utara') 
            {
                $q->where('gerwil', 'Utara');
            }
            else 
            {
                $q->where('gerwil', 'Belum');
            } 
        }
        

        if(Auth::user()->level == 'user')
        {
            $q->where('anggota_id', Auth::user()->Anggota->id);
        }

        $datas = $q->get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.gerwil_pdf', compact('datas'));
       return $pdf->download('laporan_gerwil_'.date('Y-m-d_H-i-s').'.pdf');
    }
    
    //DOWNLOAD DASHBOARD
    public function dashboard()
    {
        return view('laporan.dashboard');
    }

    public function dashboardPdf(Request $request)
    {

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.dashboard_pdf', compact('datas'));
       return $pdf->download('dashboard_'.date('Y-m-d_H-i-s').'.pdf');
    }

  //TAG TUTUP  
}

