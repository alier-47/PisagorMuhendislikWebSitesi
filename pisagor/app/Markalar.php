<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Markalar extends Model
{

    protected $table = 'markalar';
    protected $fillable = ['marka_adi','resim_Yol','resim_alt','slug'];


    public function urunler(){
        return $this->hasMany(Urunler::class,'id', 'marka');
    }
}

