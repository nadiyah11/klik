<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable =  ['logo','nama_bar','merk','harga_satuan','stock'];
	 
	public function Tran_Masuk()
	    {
	    	return $this->hasMany('App\Tran_Masuk','barang_id');
	    }
	public function Tran_Keluar()
	    {
	    	return $this->hasMany('App\Tran_Keluar','barang_id');
	    }
}
