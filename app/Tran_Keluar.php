<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tran_Keluar extends Model
{
    //
    protected $fillable =  ['tgl_keluar','user_id','barang_id'];
	 
	public function User()
	    {
	    	return $this->belongsTo('App\User','user_id');
	    }
	public function Barang()
	    {
	    	return $this->belongsTo('App\Barang','barang_id');
	    }
}
