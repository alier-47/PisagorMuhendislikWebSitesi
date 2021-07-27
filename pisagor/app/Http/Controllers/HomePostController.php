<?php

namespace App\Http\Controllers;

use App\Kesif_Talebi;
use App\Mesajlar;
use App\Yorum;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class HomePostController extends HomeController
{

    public function post_kesifFormu(Request $request){
        try {
            $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
            $slug = str_slug($request->ad_soyad) . '-' . $tarih; // aynı isimde 2 duyuru varsa karışmaması için tarih eklenir.
            $request->merge(['slug' => $slug]); //harf dışındaki karakterleri siler ve bu slug url için kullanılır.
            Kesif_Talebi::create($request->all());
            $data = array
            (
                'ad_soyad'=>$request->ad_soyad,
                'mail'=>$request->mail,
                'telefon'=>$request->telefon,
                'il'=>$request->il,
                'ilce'=>$request->ilce,
                'adres'=>$request->adres,
                'aciklama'=>$request->aciklama
            );
            Mail::send('frontend.kesif', $data, function ($message) use ($request){
                $message->subject ('Keşif Talebi');
                $message->from ('info@pisagormuhendislik.com', 'Keşif Talebi');
                $message->to('pisagormuhendislik@gmail.com', '');
            });
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "Talebiniz İletildi. En Kısa Sürede Size Dönüş Yapılacaktır"]);
        }catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Talep Gönderilirken Bir Hata Oluştu... </strong>"]);
        }

    }
    public function post_mesaj(Request $request){
        // Zorunluluk kontrolü
        $validator = Validator::make($request->all(), [
            'adsoyad' => 'required',
            'telefon' => 'required',
            'mesaj' => 'required'
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen zorunlu alanları doldurunuz </strong>"]);
        }

        try{
            Mesajlar::create($request->all());
            $data = array
            (
                'adsoyad'=>$request->adsoyad,
                'mail'=>$request->mail,
                'telefon'=>$request->telefon,
                'mesaj'=>$request->mesaj
            );

            Mail::send('frontend.mesajgonder', $data, function ($message) use ($request){
                $message->subject ('pisagormuhendislik.com dan gelen mesaj');
                $message->from ('info@pisagormuhendislik.com', 'Pisagor Mühendislik');
                $message->to('pisagormuhendislik@gmail.com', '');
            });
            return response(['durum' => 'success', 'baslik' => "", 'icerik' =>'Mesajınız İletildi. En Kısa Sürede Size Dönüş Yapılacaktır.' ]);
        }catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Mesaj Gönderilirken Bir Hata Oluştu... </strong>"]);

        }
    }
}
