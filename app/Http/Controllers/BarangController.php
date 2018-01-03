<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Illuminate\Support\Facades\Session;
// use App\Tran_Keluar;
// use App\Tran_Masuk;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang= Barang::with('Tran_Masuk','Tran_Keluar')->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.create');
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
        $this->validate($request, ['logo' => 'image|max:20048',
            'nama_bar' => 'required',
            'merk' => 'required',
            'stock' => 'required||numeric']);
        $barang = Barang::create($request->except('logo'));
        // isi field logo jika ada logo yang diupload
        if ($request->hasFile('logo')) {
        // Mengambil file yang diupload
        $uploaded_logo = $request->file('logo');
        // mengambil extension file
        $extension = $uploaded_logo->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan logo ke folder public/img
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $uploaded_logo->move($destinationPath, $filename);
        // mengisi field logo di Barang dengan filename yang baru dibuat
        $barang->logo = $filename;
        $barang->save();
        }
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $barang->nama_bar, dengan merk $barang->merk,$barang->nama_bar,$barang->nama_bar"
        ]);
        return redirect()->route('barang.index');
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
        $barang = Barang::findOrFail($id);
        return view('barang.show',compact('barang'));
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
        $barang = Barang::findOrFail($id);
        return view('barang.edit',compact('barang'));
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
        $this->validate($request, ['logo' => 'image|max:20048',
            'nama_bar' => 'required',
            'merk' => 'required',
            'stock' => 'required||numeric']);
        $barang = Barang::find($id);
        $barang -> update($request->all());
        // isi field logo jika ada logo yang diupload
        if ($request->hasFile('logo')) {
        // Mengambil file yang diupload
        $uploaded_logo = $request->file('logo');
        // mengambil extension file
        $extension = $uploaded_logo->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan logo ke folder public/img
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $uploaded_logo->move($destinationPath, $filename);
        // mengisi field logo di Barang dengan filename yang baru dibuat
        $barang->logo = $filename;
        $barang->save();
        }
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $barang->nama_bar, dengan merk $barang->merk,$barang->stock"
        ]);
        return redirect()->route('barang.index');
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
        Barang::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Barang berhasil dihapus"
        ]);
        return redirect()->route('barang.index');
    }
}
