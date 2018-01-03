<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use Session;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $karyawan= Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('karyawan.create');
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
        $this->validate($request, ['nama_kar' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'no_hp' => 'required||numeric||min:13',
            'bagian' => 'required']);
        $karyawan = Karyawan::create($request->all());
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan data dengan nama : $karyawan->nama_kar, alamat : $karyawan->alamat,jenis kelamin : $karyawan->jk,no hp :$karyawan->no_hp,bagian : $karyawan->bagian"
        ]);
        return redirect()->route('karyawan.index');

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
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show',compact('karyawan'));
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
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit',compact('karyawan'));
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
        $this->validate($request, ['nama_kar' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'no_hp' => 'required||numeric',
            'bagian' => 'required']);
        $karyawan = Karyawan::find($id);
        $karyawan->update($request->all());
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan data dengan nama : $karyawan->nama_kar, alamat : $karyawan->alamat,jenis kelamin : $karyawan->jk,no hp :$karyawan->no_hp,bagian : $karyawan->bagian"
        ]);
        return redirect()->route('karyawan.index');
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
        Karyawan::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Karyawan berhasil dihapus"
        ]);
        return redirect()->route('karyawan.index');
    }
}
