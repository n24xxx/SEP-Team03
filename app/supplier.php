<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\SupplierResetPasswordNotification;


class Supplier extends Authenticatable
{
  
    use Notifiable;
    protected $guard='supplier';
    public function products(){
        return $this->hasMany('App\product','supplier_id','id');
    }
    public function bill_detail(){
        return $this->hasMany('App\billdetail','id_supplier','id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','phone','logo','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SupplierResetPasswordNotification($token));
    }
}

