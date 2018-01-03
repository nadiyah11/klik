<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tran_Masuk;
use App\Barang;
use App\User;
use App\Supplier;
use Session;

class TranMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tran_masuk= Tran_Masuk::with('Barang','User','Supplier')->get();
        return view('tran_masuk.index', compact('tran_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tran_masuk.create');
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
        $this->validate($request, [
            'tgl_masuk' => 'required',
            'user_id' => 'required|exists:users,id',
            'sup_id' => 'required|exists:suppliers,id',
            'barang_id' => 'required|exists:barangs,id',
            'hargas' => 'required||numeric',
            'jumlahs' => 'required||numeric']);
        $tran_masuk = new Tran_Masuk;
        $tran_masuk->tgl_masuk=$request->tgl_masuk;
        $tran_masuk->user_id=$request->user_id;
        $tran_masuk->sup_id=$request->sup_id;
        $tran_masuk->barang_id=$request->barang_id;
        $tran_masuk->hargas=$request->hargas;
        $tran_masuk->jumlahs=$request->jumlahs;

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stock = $barang->stock + $request->jumlahs;
        $tran_masuk->total = $tran_masuk->hargas * $request->jumlahs;
        $barang->save();
        $tran_masuk->save();

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan data yang masuk pada : $tran_masuk->tgl_masuk, pencatat dgn id : $tran_masuk->user_id,penyuplai : $tran_masuk->sup_id,harganya :$tran_masuk->hargas,$tran_masuk->jumlas"
        ]);
        return redirect()->route('tran_masuk.index');
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
        $tran_masuk = Tran_Masuk::findOrFail($id);
        return view('tran_masuk.show',compact('tran_masuk'));
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
        $tran_masuk = Tran_Masuk::findOrFail($id);
        return view('tran_masuk.edit',compact('tran_masuk'));
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
            'tgl_masuk' => 'required',
            'user_id' => 'required|exists:users,id',
            'sup_id' => 'required|exists:suppliers,id',
            'barang_id' => 'required|exists:barangs,id',
            'hargas' => 'required||numeric',
            'jumlahs' => 'required||numeric']);
        $tran_masuk = Tran_Masuk::find($id);
        $tran_masuk->update($request->all());
        $tran_masuk->tgl_masuk=$request->tgl_masuk;
        $tran_masuk->user_id=$request->user_id;
        $tran_masuk->sup_id=$request->sup_id;
        $tran_masuk->barang_id=$request->barang_id;

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stock = ($barang->stock + $tran_masuk->jumlahs) - $request->jumlahs;
        $barang->save();

        $tran_masuk->hargas=$request->hargas;
        $tran_masuk->jumlahs=$request->jumlahs;
        $tran_masuk->save();

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan data yang masuk pada : $tran_masuk->tgl_masuk, pencatat dgn id : $tran_masuk->user_id,penyuplai : $tran_masuk->sup_id,harganya :$tran_masuk->hargas,$tran_masuk->jumlas"
        ]);
        return redirect()->route('tran_masuk.index');
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
        Tran_Masuk::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data berhasil dihapus"
        ]);
        return redirect()->route('tran_masuk.index');
    }
}
