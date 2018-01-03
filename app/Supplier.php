<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable =  ['nama_per'];
	 
	 public function Tran_Masuk()
	    {
	    	return $this->hasMany('App\Tran_Masuk','sup_id');
	    }
}
