<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Santri::all();
        return view('santri', compact('data'));
    }

    public function tambah()
    {
        return view('addsantri');
    }

    public function add(Request $request)
    {
        Santri::insert([
            'id_santri' => $request->id_santri,
            'nama_santri' => $request->nama_santri,
            'kamar' => $request->kamar,
            'tanggal_masuk' => $request->tanggal_masuk
        ]);

        return redirect('santri');
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
        $data=Santri::where('id_santri',$id)->get();
        
        return view('editsantri',['data' => $data]);
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
        Santri::where('id_santri', $request->id_santri)->update([
            'id_santri'=> $request->id_santri,
            'nama_santri' =>$request->nama_santri,
            'kamar' => $request->kamar,
            'tanggal_masuk' => $request->tanggal_masuk
        ]);

        return redirect('santri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Santri::where('id_santri', $id)->delete();

        return redirect('santri');
    }
}
