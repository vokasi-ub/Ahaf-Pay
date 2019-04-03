<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('index', compact('pembayaran'));
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
