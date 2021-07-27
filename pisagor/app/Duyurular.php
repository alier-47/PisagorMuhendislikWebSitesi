<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duyurular extends Model
{
    protected $table='duyurular';
    protected $fillable=['baslik','icerik','resimler[]','slug'];

    public function resim(){
        return $this->belongsTo(Resimler::class,'id','duyuruID');
    }

    // tarih yazdırma fonk.
    public function dateMonth()
    {
        return $this->created_at->formatLocalized('%b');
    }
    public function dateDay()
    {
        return $this->created_at->formatLocalized('%e');
    }

    // yazar eşleştirme

    public function user(){
        return $this->hasOne('App\User','id','yazar');
    }
}
