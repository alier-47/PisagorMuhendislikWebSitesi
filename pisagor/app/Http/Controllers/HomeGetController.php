<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use App\Markalar;
use App\Referans_resim;
use App\Referanslar;
use App\Duyurular;
use App\Hakkimizda;
use App\İlceler;
use App\İller;
use App\Kategoriler;
use App\Slider;
use App\Urunler;
use App\Urunler_resim;
use App\User;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Http\Response;

class HomeGetController extends HomeController
{

    public function get_index(){
        $referanslar = Referanslar::orderBy('created_at','desc')->take(4)->get();
        $duyurular = Duyurular::orderBy('created_at','desc')->take(4)->get();
        $sliders = Slider::orderBy('sira','asc')->orderBy('created_at','desc')->get();
        $urunler = Urunler::orderBy('created_at','desc')->take(3)->get();
        return view('frontend.index')->with('referanslar', $referanslar)->with('sliders',$sliders)->with('duyurular',$duyurular)->with('urunler',$urunler);
    }

    public function get_index_yonlendir(){
        return redirect('/');
    }

    public function get_iletisim(){
        $ayarlar = Ayarlar::where('id', 1)->select('ayarlar.*')->first();
        return view('frontend.iletisim')->with('ayarlar', $ayarlar);
    }

    public function get_hakkimizda(){
        $hakkimizda = Hakkimizda::where('id', 1)->select('hakkimizda.*')->first();
        return view('frontend.hakkimizda')->with('hakkimizda', $hakkimizda);
    }

    public function get_dogalgaz(){
        return view('frontend.hizmetler.dogalgaz');
    }
    public function get_mekanik(){
        return view('frontend.hizmetler.mekanik-tesisat');
    }
    public function get_klima(){
        return view('frontend.hizmetler.klima-sistemleri');
    }


    public function get_duyuru(){
        $duyurular = Duyurular::orderBy('created_at','desc')->paginate(10);
        return view('frontend.duyuru')->with('duyurular', $duyurular)->with('tumduyurular',$duyurular);
    }
    public function get_duyuru_detay($slug)
    {
        $duyuru = Duyurular::where('slug', $slug)->first();
        $duyurular = Duyurular::all();
        return view('frontend.duyuru-icerik')->with('duyuru', $duyuru)->with('tumduyurular',$duyurular);
    }

    public function get_urunMarka($slug){
       $marka = Markalar::where('marka_adi',$slug)->first();
       $tummarkalar = Markalar::all();
        $urunler = Urunler::where('marka',$marka->id)->get();
        return view('frontend.urun-marka',['urunler'=>$urunler,'tumMarkalar'=>$tummarkalar,'markaAdi'=>$marka->marka_adi]);
    }
    public function get_referanslar(){
        $referanslar = Referanslar::orderBY('created_at','desc')->paginate(20);

        return view('frontend.Referanslar')->with('referanslar',$referanslar);
    }
    public function get_referans_detay($slug){
        $referans = Referanslar::where('slug',$slug)->first();
        $tumReferanslar = Referanslar::all();
        return view('frontend.referans_detay',['referans'=>$referans,'tumReferanslar'=>$tumReferanslar]);
    }

    public function  get_Urunler(){
        $urunler = Urunler::orderBY('created_at','desc')->paginate(20);
        return view('frontend.urunler')->with('urunler', $urunler);
    }

    public  function  get_UrunDetay($slug){
        $urun = Urunler::where('slug',$slug)->first();
        $tumUrunler = Urunler::all();
        return view('frontend.urun-detay')->with('urun',$urun)->with('urunler',$tumUrunler);
    }

    public function sitemap(){
        $urunler = Urunler::orderBy('updated_at', 'DESC')->get();
        $duyurular = Duyurular::orderBy('updated_at', 'DESC')->get();
        $markalar = Markalar::orderBy('updated_at', 'DESC')->get();
        $referanslar = Referanslar::orderBy('updated_at', 'DESC')->get();
        $now = Carbon::now()->toAtomString();

        return response()->view('frontend.sitemap',[
            'now'=>$now,
            'urunler'=>$urunler,
            'duyurular'=>$duyurular,
            'markalar'=>$markalar,
            'referanslar'=>$referanslar
        ])->header('Content-Type', 'application/xml');
    }
}
