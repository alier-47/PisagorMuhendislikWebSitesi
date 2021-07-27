<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referans_resim extends Model
{
    protected $table='referans_resim';
    protected $fillable=['resim_Yol','slug','binaID','resim_alt'];

    public function referans(){
        return $this->hasMany(Referanslar::class, 'binaID','id');
    }
}
