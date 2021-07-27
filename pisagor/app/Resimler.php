<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resimler extends Model
{
    protected $table='resimler';
    protected $fillable=['resim_Yol','resim_alt','duyuruID'];

    public function duyuru(){
        return $this->hasMany(Duyurular::class, 'duyuruID','id');
    }
}
