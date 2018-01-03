<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tran_Masuk extends Model
{
    //
    protected $fillable =  ['tgl_masuk','user_id','sup_id','barang_id','hargas','jumlahs'];
	 
	public function User()
	    {
	    	return $this->belongsTo('App\User','user_id');
	    }
	public function Supplier()
	    {
	    	return $this->belongsTo('App\Supplier','sup_id');
	    }
	public function Barang()
	    {
	    	return $this->belongsTo('App\Barang','barang_id');
	    }
}
