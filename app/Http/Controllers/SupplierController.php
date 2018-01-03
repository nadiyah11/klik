<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Tran_Masuk;
use Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier= Supplier::with('Tran_Masuk')->get();
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('supplier.create');
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
        $this->validate($request, ['nama_per' => 'required']);
        $supplier = Supplier::create($request->all());
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $supplier->nama_per"
        ]);
        return redirect()->route('supplier.index');
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
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show',compact('supplier'));
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
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit',compact('supplier'));
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
        $this->validate($request, ['nama_per' => 'required|unique:suppliers,nama_per,'. $id]);
        $supplier = Supplier::find($id);
        $supplier->update($request->only('nama_per'));
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $supplier->nama_per"
        ]);
        return redirect()->route('supplier.index');
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
        Supplier::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Supplier berhasil dihapus"
        ]);
        return redirect()->route('supplier.index');
    }
}
