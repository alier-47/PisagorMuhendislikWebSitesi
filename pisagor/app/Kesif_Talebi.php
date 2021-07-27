<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kesif_Talebi extends Model
{
    protected $table ='kesiftalebi';
    protected $fillable = ['ad_soyad','telefon','mail','il','ilce','slug','adres','aciklama'];

    public function getİller(){
        return $this->hasMany('App\İller','il_no','il');
    }
    public function getİlceler(){
        return $this->hasMany('App\İlceler','ilce_no','ilce');
    }
}
