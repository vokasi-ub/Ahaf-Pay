<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Pembayaran;
use App\Santri;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('index');
        }

        
    }
    

    public function index()
    {

        
            $pembayaran = Pembayaran::all();
            return view('index', compact('pembayaran'));
        
       
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $pembayaran = Pembayaran::where('bulan', 'like', "%".$cari."%")
        ->paginate();

        return view('index',['pembayaran' => $pembayaran]);
    }

    public function tambah(){
        
            return view('addpay');
        
       
    }

    public function add(Request $request)
    {
        Pembayaran::insert([
            'id_pembayaran' => $request->id_pembayaran,
            'id_santri' => $request->id_santri,
            'id_admin' => $request->id_admin,
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'nominal' => $request->nominal
        ]);

        return redirect('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function queri()
    {
        $januari = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Januari')
        ->get();

        $februari = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Februari')
        ->get();

        $maret = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Maret')
        ->get();

        $april = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','April')
        ->get();

        $mei = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Mei')
        ->get();

        $juni = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Juni')
        ->get();

        $juli = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Juli')
        ->get();

        $agustus = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Agustus')
        ->get();

        $september = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','September')
        ->get();

        $oktober = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Oktober')
        ->get();

        $nopember = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Nopember')
        ->get();

        $desember = Santri::select('santri.nama_santri', 'pembayaran.bulan')
        ->join('pembayaran', 'pembayaran.id_santri','=','santri.id_santri')
        ->where('pembayaran.bulan','Desember')
        ->get();



        return view('dashboard', compact('januari','februari','maret','april','mei','juni','juli','agustus',
                                            'september','oktober','nopember','desember'));
    }

    public function rekap()
    {
        $rekap = Pembayaran::select('bulan',DB::raw('SUM(nominal) as Jumlah'))
        ->groupBy('bulan')
        ->get();

        return view('rekap', compact('rekap'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran=Pembayaran::where('id_pembayaran',$id)->get();
        
        return view('editpay',['pembayaran' => $pembayaran]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Pembayaran::where('id_pembayaran',$request->id_pembayaran)->update([
            'id_pembayaran' => $request->id_pembayaran,
            'id_santri' => $request->id_santri,
            'id_admin' => $request->id_admin,
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'nominal' => $request->nominal
        ]);
        return redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Pembayaran::where('id_pembayaran', $id)->delete();

        return redirect('index');
    }
}
