<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table ="address";
    public $timestamps = false;
   public function customers(){
    	return $this->belongsTo('App\customer','id_customer','id');
    }
    public function bills(){
    	return $this->hasMany('App\bill','address_id','id');
    }
}
