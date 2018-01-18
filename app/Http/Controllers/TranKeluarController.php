<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Tran_Keluar;
use Session;

class TranKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tran_keluar= Tran_Keluar::with('Barang','User')->get();
        return view('tran_keluar.index', compact('tran_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tran_keluar.create');
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
        $max = Barang::findOrFail($request->barang_id);
         $this->validate($request, [
            'tgl_keluar' => 'required',
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlahk' => 'required||numeric|min:0']);
        $tran_keluar = new Tran_Keluar;
        $tran_keluar->tgl_keluar=$request->tgl_keluar;
        $tran_keluar->user_id=$request->user_id;
        $tran_keluar->barang_id=$request->barang_id;
        $tran_keluar->jumlahk=$request->jumlahk;
        $tran_keluar->save();

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stock = $barang->stock - $request->jumlahk;

        $barang->save();

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan data yang keluar pada : $tran_keluar->tgl_keluar, pencatat dgn id : $tran_keluar->user_id,barang :$tran_keluar->barang_id,$tran_keluar->jumlak"
        ]);
        return redirect()->route('tran_keluar.index');
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
        $tran_keluar = Tran_Keluar::findOrFail($id);
        return view('tran_keluar.show',compact('tran_keluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tran_keluar = Tran_Keluar::findOrFail($id);
        return view('tran_keluar.edit',compact('tran_keluar'));
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
        //
        $this->validate($request, [
            'tgl_keluar' => 'required',
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlahk' => 'required||numeric']);
        $tran_keluar = Tran_Keluar::find($id);

        $tran_keluar->update($request->all());
        $tran_keluar->tgl_keluar=$request->tgl_keluar;
        $tran_keluar->user_id=$request->user_id;
        $tran_keluar->barang_id=$request->barang_id;

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stock = ($barang->stock + $tran_keluar->jumlahk) - $request->jumlahk;
        $barang->save();

        $tran_keluar->jumlahk=$request->jumlahk;
        $tran_keluar->save();

        

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan data yang keluar pada : $tran_keluar->tgl_keluar, pencatat dgn id : $tran_keluar->user_id,barang :$tran_keluar->barang_id,$tran_keluar->jumlak"
        ]);
        return redirect()->route('tran_keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tran_Keluar::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data berhasil dihapus"
        ]);
        return redirect()->route('tran_keluar.index');
    }
}
