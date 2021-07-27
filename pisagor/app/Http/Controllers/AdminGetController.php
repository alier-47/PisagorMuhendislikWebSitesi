<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use App\Mesajlar;
use App\Referans_resim;
use App\Referanslar;
use App\Duyurular;
use App\Hakkimizda;
use App\Kategoriler;
use App\Kesif_Talebi;
use App\Markalar;
use App\Resimler;
use App\Slider;
use App\Urunler;
use App\Urunler_resim;
use Illuminate\Http\Request;

class AdminGetController extends AdminController
{
    public function get_index(){
        return view('backend.index');
    }
    public function get_ayarlar(){
        $ayarlar = Ayarlar::where('id', 1)->select('ayarlar.*')->first();
        return view('backend.ayarlar')->with('ayarlar', $ayarlar);
    }
    public function get_hakkimizda(){
        $hakkimizda = Hakkimizda::where('id', 1)->select('hakkimizda.*')->first();
        return view('backend.hakkimizda')->with('hakkimizda', $hakkimizda);
    }
    public function get_duyuru(){
        $duyurular = Duyurular::orderBy('created_at','desc')->get();
        return view('backend.duyuru')->with('duyurular', $duyurular);
    }
    public function get_duyuru_duzenle($slug){
        $duyuru = Duyurular::where('slug',$slug)->first();
        $id = $duyuru->id;
        $image = Resimler::where('duyuruID', $id)->get();
        return view('backend.duyuru-duzenle')->with('duyuru',$duyuru)->with('images',$image);
    }
    public function get_referanslar(){
        $binalar = Referanslar::orderBy('created_at','desc')->get();
        return view('backend.referanslar')->with('binalar',$binalar);
    }
    public function get_slider(){
        $slider = Slider::orderBy('created_at','desc')->get();
        return view('backend.slider')->with('slider', $slider);
    }
    public function get_kesifTalebi(){
        $kesifTalepleri  = Kesif_Talebi::orderBY('created_at','desc')->get();
        return view('backend.kesifTalepleri')->with('kesifTalepleri',$kesifTalepleri);
    }
    public function get_mesajlar(){
        $mesajlar  = Mesajlar::orderBY('created_at','desc')->get();
        return view('backend.mesajlar')->with('mesajlar',$mesajlar);
    }
    public function get_referans_duzenle($slug){
        $referans = Referanslar::where('slug',$slug)->first();
        $id = $referans->id;
        $image = Referans_resim::where('binaID', $id)->get();
        return view('backend.referans-duzenle')->with('referans',$referans)->with('images',$image);
    }
    public function get_urunler(){
        $urunler = Urunler::orderBy('created_at','desc')->get();
        $markalar = Markalar::all();
        return view('backend.urunler')->with('urunler', $urunler)->with('markalar', $markalar);
    }
    public function get_urun_duzenle($slug){
        $urunler = Urunler::where('slug',$slug)->first();
        $id = $urunler->id;
        $image = Urunler_resim::where('urunID', $id)->get();
        $markalar = Markalar::where('id','!=',$urunler->marka)->get();
        return view('backend.urun-duzenle')->with('urun',$urunler)->with('images',$image)->with('markalar',$markalar);
    }
    public function get_marka_duzenle($slug){
        $markalar = Markalar::where('slug',$slug)->first();
        return view('backend.urun-duzenle')->with('markalar',$markalar);
    }
}
