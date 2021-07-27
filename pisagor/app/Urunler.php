<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urunler extends Model
{
    protected $table = 'urunler';
    protected $fillable = ['urun_adi','marka','YogusmaTipi','maxVerim','Kapasite','aciklama','fiyat','keywords','description','slug'];

    public function resimler(){
        return $this->belongsTo(Urunler_resim::class,'id', 'urunID');
    }

    public function markalar(){
        return $this->belongsTo(Markalar::class,'marka', 'id');
    }
    public static function getMarka($marka = null)
    {
        echo Markalar::where('id', '=', $marka)->value('marka_adi');
    }
    public static function getMarkaID($marka = null)
    {
        echo Markalar::where('id', '=', $marka)->value('id');
    }

}
