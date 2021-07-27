<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormValidation;
use App\Markalar;
use App\Mesajlar;
use Validator;
use App\Referans_resim;
use App\Referanslar;
use App\Duyurular;
use App\Hakkimizda;
use App\Ayarlar;
use App\Kategoriler;
use App\Kesif_Talebi;
use App\Resimler;
use App\Slider;
use App\Urunler;
use App\Urunler_resim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;



class AdminPostController extends AdminController
{
    public function post_ayarlar(Request $request){
        if (Auth::check() && Auth::user()->yetki() > 0) {
            if (isset($request->logo)) {
                $validator = Validator::make($request->all(), [
                    'logo' => 'mimes:jpg,jpeg,png,gif',
                ]);
                if ($validator->fails()) {
                    return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Yüklediğiniz Dosya Formatları Sadece jpg,jpeg,png veya gif Olmalıdır </strong>"]);
                }
                $logo = Input::file('logo');
                $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
                $logo_isim = 'logo.' . $logo_uzanti;
                Storage::disk('uploads')->makeDirectory('img');
                Image::make($logo->getRealPath())->resize(222, 108)->save('uploads/img/' . $logo_isim);

            }

            try {
                unset($request['_token']);
                if (isset($request->logo)) {
                    unset($request['eski_logo']);
                    Ayarlar::where('id', 1)->update($request->all());
                    Ayarlar::where('id', 1)->update(['logo' => $logo_isim]);
                } else {
                    $eski_logo = $request->eski_logo;
                    unset($request['eski_logo']);
                    Ayarlar::where('id', 1)->update($request->all());
                    Ayarlar::where('id', 1)->update(['logo' => $eski_logo]);
                }
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt Başarıyla Yapıldı</strong>"]);

            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Kayıt Yapılamadı </strong>"]);
            }
        }else{
            return view('frontend.login');
        }

    }
    public function post_hakkimizda(Request $request){
        try{
            unset($request['_token']);
            Hakkimizda::where('id', 1)->update($request->all());
        return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt Başarılı Bir Şekilde Gerçekleşti </strong>"]);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Kayıt Yapılamadı </strong>"]);
        }
    }
    public function post_duyuru_ekle(Request $request){
        // zorunlu alan kontrolü
        $validator = Validator::make($request->all(), [
            'baslik' => 'required|max:250',
            'icerik' => 'required'
        ]);
        //Resim için zorunlu alan kotrolü
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen Zorunlu Alanları Doldurun </strong>"]);
        }
        $validator2 = Validator::make($request->all(),[
            'resimler' => 'required',
            'resimler.*' => 'mimes:JPG,jpg,jpeg,png,gif',
        ]);

        if ($validator2->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Resim Formatı jpg,jpeg,png veya gif olmalıdır</strong>"]);
        }

        // kayıt işlemleri
        $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
        $slug = str_slug($request->baslik).'-'.$tarih; // aynı isimde 2 duyuru varsa karışmaması için tarih eklenir.
        $resimler = $request->file('resimler');
        $request->merge(['slug' => $slug,'yazar'=>Auth::user()->id]); //harf dışındaki karakterleri siler ve bu slug url için kullanılır.

        if (!empty($resimler)) {
            try {
                $i = 0;

                $duyuru = Duyurular::create($request->all());
                foreach ($resimler as $resim) {
                    $resim_isim = $tarih . '-' . $resim->getClientOriginalName();
                    Storage::disk('uploads')->put('img/duyuru/' . $resim_isim, file_get_contents($resim)); // kalsöre kayıt işlemi
                    Resimler::create(['duyuruID' => $duyuru->id,'resim_alt'=>$request->resim_alt, 'resim_Yol' => $resim_isim]);
                    $i++;
                }

                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt Başarıyla Yapıldı</strong>"]);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Kayıt Yapılamadı </strong>", 'hata' => $e]);
            }
        }else{

            $duyuru = Duyurular::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt Başarıyla Yapıldı </strong>"]);

        }

    }
    public function post_duyuru_sil(Request $request){
        try {
            $sayac = Resimler::where('duyuruID', $request->duyuruid)->count();
           for ($i=0; $i<$sayac ; $i++){
               $resimID = Resimler::where('duyuruID', $request->duyuruid)->value('id');
               $resimYol = Resimler::where('duyuruID', $request->duyuruid)->value('resim_Yol');
               Resimler::where('id',$resimID)->delete();
               unlink('uploads/img/duyuru/'.$resimYol);
           }
            Duyurular::where('slug', $request->slug)->delete();

                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Silme İşlemi Başarılı</strong>"]);
        }catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu</strong>", 'hata' => $e]);
        }
    }
    public function post_duyuru_duzenle($slug,Request $request){
        // resim silme
        if (isset($request->resim)){// daha önceden bu duyuruun resimleri varsa işlemler burda yapılır yeni resimler için request kullanılır.
            try {
                Resimler::where('resim_Yol',$request->resim)->delete();
                unlink('uploads/img/duyuru/'.$request->resim);
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Resim Silindi...']);
            }catch (\Exception $e){
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu</strong>", 'hata' => $e]);
            }

        }
        // zorunlu alan kontrolü
        $validator = Validator::make($request->all(), [
            'baslik' => 'required'
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen Başlık Kısmını Giriniz! </strong>"]);
        }
        $validator = Validator::make($request->all(), [
            'images.*' => 'nullable|mimes:jpg,jpeg,png,gif'
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Resim Formatı jpg,jpeg,png veya gif olamlıdır </strong>"]);
        }

        //güncelleme

        $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
        $resimler = $request->file('images');
        if (!empty($resimler)) {
                $i = 0;

                $duyuru = Duyurular::where('slug',$slug)->first();
                foreach ($resimler as $resim) {
                    $resim_isim = $tarih . '-' . $resim->getClientOriginalName();
                    Storage::disk('uploads')->put('img/duyuru/' . $resim_isim, file_get_contents($resim)); // kalsöre kayıt işlemi
                    Resimler::create(['duyuruID' => $duyuru->id, 'resim_alt'=>$request->resim_alt,'resim_Yol' => $resim_isim]);
                    $i++;
                }
        }
            try {
            Duyurular::where('slug', $slug)->update(['baslik'=>$request->baslik,'icerik'=> $request->icerik]);
                return response(['durum' => 'success', 'baslik' => "<strong style='font-weight:bold; color:green'>Güncelleme İşlemi Başarıyla Yapıldı</strong>", 'icerik' =>'Lütfen Yapacağınız İşlemi Seçiniz!' ]);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => "<strong style='font-weight:bold; color:red'>Güncelleme Yapılırken Bir Hata Oluştu. </strong>", 'icerik' => 'Lütfen Tekrar Deneyiniz' , 'hata' => $e]);
            }
    }
    public function post_kategori_ekle(Request $request){
        $validator = Validator::make($request->all(), [
            'ad' => 'required'
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen Kategori Adını Giriniz! </strong>"]);
        }
        try{
            $slug = str_slug($request->ad);
            $request->merge(['slug'=>$slug]);
            Kategoriler::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt İşlemi Başarılı Bir Şekilde Yapıldı</strong>"]);
        }catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => "<strong style='font-weight:bold; color:red'>Kayıt Yapılırken Bir Hata Oluştu. </strong>", 'icerik' => 'Lütfen Tekrar Deneyiniz' , 'hata' => $e]);
        }
    }
    public function post_kategori_sil(Request $request){
        try{
                Kategoriler::where('ust_kategori', $request->id)->delete();
            Kategoriler::where('id', $request->id)->delete();

            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Silme İşlemi Başarılı Bir Şekilde Yapıldı</strong>"]);
        }catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu. </strong>", 'icerik' => 'Lütfen Tekrar Deneyiniz' , 'hata' => $e]);
        }
    }
    public function post_referanslar(Request $request){
        // zorunlu alan kontrolü
        $validator = Validator::make($request->all(), [
            'resimler[]' => 'mimes:jpg,jpeg,png,gif',
            'bina_adi' => 'required|max:250',
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen Zorunlu Alanları Doldurun </strong>"]);
        }

        // isim Kontrolü
        if(Referanslar::where('bina_adi', $request->bina_adi)->count() > 0) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Bu Bina Adı Zaten Bulunmaktadır </strong>"]);
        }
        // kayıt işlemleri
        $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
        $slug = str_slug($request->bina_adi).'-'.$tarih; // aynı isimde 2 duyuru varsa karışmaması için tarih eklenir.
        $resimler = $request->file('resimler');
        $request->merge(['slug' => $slug]); //harf dışındaki karakterleri siler ve bu slug url için kullanılır.

        if (!empty($resimler)) {
            try {
                $i = 0;

                $bina = Referanslar::create($request->all());
                foreach ($resimler as $resim) {
                    $resim_isim = $tarih . '-' . $resim->getClientOriginalName();
                    $path = public_path('uploads/img/binalar/' . $resim_isim);
                    Image::make($resim->getRealPath())->resize(1280, 720)->save($path); // kalsöre kayıt işlemi
                    Referans_resim::create(['binaID' => $bina->id, 'resim_Yol' => $resim_isim, 'slug' => $slug, 'resim_alt' => $request->resim_alt]);
                    $i++;
                }
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt Başarıyla Yapıldı</strong>"]);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Kayıt Yapılamadı </strong>"]);
            }
        }
    }
    public function post_referans_sil(Request $request){
        if (Auth::check() && Auth::user()->yetki() > 0) {
            try {
                $binaID = Referanslar::where('slug',$request->slug)->value('id');
                $sayac = Referans_resim::where('binaID', $binaID)->count();
                for ($i=0; $i<$sayac ; $i++){
                    $resimID = Referans_resim::where('binaID', $binaID)->value('id');
                    $resimYol = Referans_resim::where('binaID', $binaID)->value('resim_Yol');
                    Referans_resim::where('id',$resimID)->delete();
                    unlink('uploads/img/binalar/'.$resimYol);
                }
                Referanslar::where('slug', $request->slug)->delete();

                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "Silme İşlemi Başarılı"]);
            }catch (\Exception $e){
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu</strong>", 'hata' => $e]);
            }
        }
    }
    public function post_referans_duzenle($slug,Request $request){
        // zorunlu alan kontrolü
        $validator = Validator::make($request->all(), [
            'resimler[]' => 'mimes:jpg,jpeg,png,gif',
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen Zorunlu Alanları Doldurun </strong>"]);
        }
        // resim silme
        if (isset($request->resim)){// daha önceden bu duyuruun resimleri varsa işlemler burda yapılır yeni resimler için request kullanılır.
            try {
                Referans_resim::where('resim_Yol',$request->resim)->delete();
                unlink('uploads/img/binalar/'.$request->resim);
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "Resim Silindi..."]);
            }catch (\Exception $e){
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu</strong>", 'hata' => $e]);
            }

        }

        //güncelleme

        $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
        $resimler = $request->file('images');
        if (!empty($resimler)) {
            $i = 0;

            $referans = Referanslar::where('slug',$slug)->first();
            foreach ($resimler as $resim) {
                $resim_isim = $tarih . '-' . $resim->getClientOriginalName();
                $path = public_path('uploads/img/binalar/'.$resim_isim);
                Image::make($resim->getRealPath())->resize(1280,720)->save($path); // kalsöre kayıt işl

                Referans_resim::create(['binaID' => $referans->id, 'resim_Yol' => $resim_isim]);
                $i++;
            }
        }
        try {
            Referanslar::where('slug', $slug)->update(['bina_adi'=>$request->bina_adi,'yer'=> $request->yer,'yapilan_isler'=>$request->yapilan_isler]);
            return response(['durum' => 'success', 'baslik' => "<strong style='font-weight:bold; color:green'>Güncelleme İşlemi Başarıyla Yapıldı</strong>", 'icerik' =>'Lütfen Yapacağınız İşlemi Seçiniz!' ]);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => "<strong style='font-weight:bold; color:red'>Güncelleme Yapılırken Bir Hata Oluştu. </strong>", 'icerik' => 'Lütfen Tekrar Deneyiniz' , 'hata' => $e]);
        }
    }
    public function post_slider(Request $request){
        // zorunlu alan kontrolü
        $validator = Validator::make($request->all(), [
            'resimler.*' => 'required|mimes:jpg,jpeg,png,gif'
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Resim Formatı jpg,jpeg,png ve gif olabilir</strong>"]);
        }

        //  Slider Sira ayarı
        if ($request->sira == null)
            $request->sira = 1;
        $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
        $slug = str_slug($request->resim_alt).'-'.$tarih; // aynı isimde 2 duyuru varsa karışmaması için tarih eklenir.
        $resimler = $request->file('resimler');
        $request->merge(['slug' => $slug]); //harf dışındaki karakterleri siler ve bu slug url için kullanılır.
        if (!empty($resimler)) {
            try {
                $i = 0;
                foreach ($resimler as $resim) {
                    $resim_isim = $tarih . '-' . $resim->getClientOriginalName();
                    $path = public_path('uploads/img/slider/'.$resim_isim);
                    Image::make($resim->getRealPath())->resize(1140,430)->save($path); // kalsöre kayıt işlemi
                    Slider::create(['resim_Yol'=>$resim_isim,'sira'=>$request->sira, 'slug'=>$slug,'resim_alt'=>$request->resim_alt]);
                    $i++;
                }

                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt Başarıyla Yapıldı</strong>"]);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Kayıt Yapılamadı </strong>", 'hata' => $e]);
            }
        }
    }
    public function post_slider_sil(Request $request){
        try{
            $slider = Slider::where('slug',$request->slug);
            $yol = $slider->value('resim_Yol');
            $slider->delete();
            unlink('uploads/img/slider/'. $yol);
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Silme İşlemi Başarılı Bir Şekilde Yapıldı</strong>"]);
        }catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu. </strong>", 'icerik' => 'Lütfen Tekrar Deneyiniz' , 'hata' => $e]);
        }
    }
    public function post_kesifTalebi_Sil(Request $request){
            if (Auth::check() && Auth::user()->yetki() > 0) {
                try {
                    Kesif_Talebi::where('slug', $request->slug)->delete();
                    return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Talep Başarıyla Silindi</strong>"]);
                } catch (\Exception $e) {
                    return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Sırasında Bir Hata Oluştu </strong>", 'hata' => $e]);
                }
            }
         }
    public function post_mesaj_sil(Request $request){
        if (Auth::check() && Auth::user()->yetki() > 0) {
            try {
                Mesajlar::where('id', $request->id)->delete();
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Talep Başarıyla Silindi</strong>"]);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Sırasında Bir Hata Oluştu </strong>", 'hata' => $e]);
            }
        }
    }
    public function post_urun_ekle(Request $request){
        // zorunlu alan kontrolü
        $validator = Validator::make($request->all(), [
            'resimler.*' => 'required|mimes:jpg,jpeg,png,gif',
            'urun_adi' => 'required|max:60',
            'marka' => 'required'
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen Zorunlu Alanları Doldurun </strong>"]);
        }

        // kayıt işlemleri
        $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
        $slug = str_slug($request->urun_adi).'-'.$tarih; // aynı isimde 2 duyuru varsa karışmaması için tarih eklenir.
        $resimler = $request->file('resimler');
        $request->merge(['slug' => $slug]); //harf dışındaki karakterleri siler ve bu slug url için kullanılır.

        if (!empty($resimler)) {
            try {
                $i = 0;

                $urun = Urunler::create($request->all());
                foreach ($resimler as $resim) {
                    $resim_isim = $tarih . '-' . $resim->getClientOriginalName();
                    $path = public_path('uploads/img/urunler/' . $resim_isim);
                    Image::make($resim->getRealPath())->resize(1024, 1024)->save($path); // klasöre kayıt işlemi
                      Urunler_resim::create(['urunID' => $urun->id, 'resim_Yol' => $resim_isim, 'slug'=>$slug]);
                    $i++;
                }

                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt Başarıyla Yapıldı</strong>"]);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Kayıt Yapılamadı </strong>", 'hata' => $e]);
            }
        }else{

            Urunler::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt Başarıyla Yapıldı </strong>"]);

        }

    }
    public function post_urun_sil(Request $request){
        try {
            $id = Urunler_resim::where('slug',$request->slug)->value('id');
            $sayac = Urunler_resim::where('urunID', $id)->count();
            for ($i=0; $i<$sayac ; $i++){
                $resimID = Urunler_resim::where('urunID', $id)->value('id');
                $resimYol = Urunler_resim::where('urunID', $id)->value('resim_Yol');
                Urunler_resim::where('id',$resimID)->delete();
                unlink('uploads/img/urunler/'.$resimYol);
            }
            Urunler::where('slug', $request->slug)->delete();

            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Silme İşlemi Başarılı</strong>"]);
        }catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu</strong>", 'hata' => $e]);
        }
    }
    public function post_urun_duzenle($slug,Request $request){

        // resim silme
        if (isset($request->resim)){// daha önceden bu ürünün resimleri varsa işlemler burda yapılır yeni resimler için request kullanılır.
            try {
                Urunler_resim::where('resim_Yol',$request->resim)->delete();
                unlink('uploads/img/urunler/'.$request->resim);
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "Resim Silindi..."]);
            }catch (\Exception $e){
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu</strong>", 'hata' => $e]);
            }

        }

        $validator = Validator::make($request->all(), [
            'images[]' => 'mimes:jpg,jpeg,png,gif',
            'urun_adi' => 'required|max:60',
            'marka' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen Zorunlu Alanları Doldurun </strong>"]);
        }


        //güncelleme

        $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
        $resimler = $request->file('images');
        if (!empty($resimler)) {
            $i = 0;

            $urun = Urunler::where('slug',$slug)->first();
            foreach ($resimler as $resim) {
                $resim_isim = $tarih . '-' . $resim->getClientOriginalName();
                $path = public_path('uploads/img/urunler/' . $resim_isim);
                Image::make($resim->getRealPath())->resize(1024,1024)->save($path); // klasöre kayıt işlemi
                Urunler_resim::create(['urunID' => $urun->id, 'resim_Yol' => $resim_isim,'slug'=>$slug]);
                $i++;
            }
        }
        try {
            Urunler::where('slug', $slug)->update(['urun_adi'=>$request->urun_adi,'marka'=> $request->marka, 'YogusmaTipi' => $request->YogusmaTipi,'maxVerim' => $request->maxVerim ,'Kapasite' => $request->Kapasite ,'aciklama'=> $request->aciklama, 'fiyat'=> $request->fiyat,'keywords'=>$request->keywords,'description'=>$request->description]);
            return response(['durum' => 'success', 'baslik' => "Güncelleme İşlemi Başarıyla Yapıldı", 'icerik' =>'Lütfen Yapacağınız İşlemi Seçiniz!' ]);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => "<strong style='font-weight:bold; color:red'>Güncelleme Yapılırken Bir Hata Oluştu. </strong>", 'icerik' => 'Lütfen Tekrar Deneyiniz' , 'hata' => $e]);
        }
    }
    public function post_marka_ekle(Request $request){
        $validator = Validator::make($request->all(), [
            'marka_adi' => 'required'
        ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => "<strong style='font-weight:bold; color:red'>Lütfen Kategori Adını Giriniz! </strong>"]);
        }
        $tarih = str_slug(Carbon::now()->format('y/m/d H:i:s')); // tarihi almak için Carbon Kullanılır
        $resim = $request->file('resim');
        if (!empty($resim)) {
                $resim_isim =$tarih. '-' .  $resim->getClientOriginalName() ;
                Storage::disk('uploads')->put('img/markalar/' . $resim_isim, file_get_contents($resim)); // kalsöre kayıt işlemi
        }
        try{
            $slug = str_slug($request->marka_adi);
            $request->merge(['slug'=>$slug,'resim_Yol'=>$resim_isim]);
            Markalar::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Kayıt İşlemi Başarılı Bir Şekilde Yapıldı</strong>"]);
        }catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => "<strong style='font-weight:bold; color:red'>Kayıt Yapılırken Bir Hata Oluştu. </strong>", 'icerik' => 'Lütfen Tekrar Deneyiniz' , 'hata' => $e]);
        }
    }
    public function post_marka_sil(Request $request){
        try{
            $marka = Markalar::where('slug', $request->slug)->first();
            unlink('uploads/img/markalar/'.$marka->resim_Yol);
            $marka->delete();
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => "<strong style='font-weight:bold; color:green'>Silme İşlemi Başarılı Bir Şekilde Yapıldı</strong>"]);
        }catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => "<strong style='font-weight:bold; color:red'>Silme İşlemi Yapılırken Bir Hata Oluştu. </strong>", 'icerik' => 'Lütfen Tekrar Deneyiniz' , 'hata' => $e]);
        }
    }
}
