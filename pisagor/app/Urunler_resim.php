<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urunler_resim extends Model
{

    protected $table = 'urunler_resim';
    protected $fillable = ['resim_Yol','urunID','resim_alt','slug'];

    public function urun(){
        return $this->hasMany(Urunler::class, 'urunID','id');
    }
}
