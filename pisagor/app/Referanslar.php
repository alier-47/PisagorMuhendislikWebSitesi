<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referanslar extends Model
{
    protected $table='referanslar';
    protected $fillable=['bina_adi','yer','yapilan_isler','slug'];
    public function resim(){
        return $this->belongsTo(Referans_resim::class,'id','binaID');
    }
    public static function getResim($id){
        $referansimg = Referans_resim::where('binaID',$id)->get();

        foreach ($referansimg as $img) {
            echo '<li><a href="/uploads/img/binalar/'.$img->resim_Yol.'" title="'.Referanslar::find($id)->value('bina_adi').'" data-lightbox="grup1"><span class="thumbnail"><img src="/uploads/img/binalar/'.$img->resim_Yol.'" class="img-responsive" style="max-height: 215px;max-width: 380px;"></span></a></li>';
        }
    }
}

