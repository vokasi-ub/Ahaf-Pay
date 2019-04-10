<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Izin;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perizinan = Izin::all();
        return view('izin', compact('perizinan'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $perizinan = Izin::where('nama_santri', 'like', "%".$cari."%")
        ->paginate();

        return view('izin',['perizinan' => $perizinan]);
    }

    public function tambah()
    {
        return view('addizin');
    }

    public function add(Request $request)
    {
        Izin::insert([
            'id_izin' => $request->id_izin,
            'id_santri' => $request->id_santri,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan
        ]);

        return redirect('izin');
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
        $perizinan=Izin::where('id_izin',$id)->get();
        
        return view('editizin',['perizinan' => $perizinan]);
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
        Izin::where('id_izin', $request->id_izin)->update([
            'id_izin' => $request->id_izin,
            'id_santri' => $request->id_santri,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan
        ]);

        return redirect('izin');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Izin::where('id_izin', $id)->delete();

        return redirect('izin');
    }
}
