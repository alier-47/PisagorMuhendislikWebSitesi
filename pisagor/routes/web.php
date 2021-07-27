<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Ayarlar;
use App\Mesajlar;

Route::get('/', 'HomeGetController@get_index');
Route::get('/index', 'HomeGetController@get_index_yonlendir');
Route::get('/home', 'HomeGetController@get_index_yonlendir');
Route::get('/anasayfa', 'HomeGetController@get_index_yonlendir');
Route::get('/iletisim', 'HomeGetController@get_iletisim');
Route::get('/hakkimizda', 'HomeGetController@get_hakkimizda');
Route::get('/referanslar', 'HomeGetController@get_referanslar');
Route::get('/referanslar/{slug}', 'HomeGetController@get_referans_detay');
Route::get('/hizmetler/dogalgaz-tesisati', 'HomeGetController@get_dogalgaz');
Route::get('/hizmetler/mekanik-tesisat', 'HomeGetController@get_mekanik');
Route::get('/hizmetler/klima-sistemleri', 'HomeGetController@get_klima');
Route::get('/duyurular', 'HomeGetController@get_duyuru');
Route::get('/duyurular/{slug}', 'HomeGetController@get_duyuru_detay')->where('slug', '^[a-zA-Z0-9-_\/]+$');
Route::get('/kesifFormu', 'HomeGetController@get_kesifFormu');
Route::post('/kesifFormu', 'HomePostController@post_kesifFormu');
Route::get('/urunler', 'HomeGetController@get_Urunler');
Route::get('/urunler/urun-detay/{slug}', 'HomeGetController@get_UrunDetay');
Route::get('/urun-marka/{slug}', 'HomeGetController@get_urunMarka');
Route::post('/mesaj-gonder', 'HomePostController@post_mesaj');
Route::get('/sitemap', 'HomeGetController@sitemap');
\Illuminate\Support\Facades\View::composer(['*'],function ($view){
    $ayar = Ayarlar::where('id',1)->first();
    $view->with('ayar',$ayar);
});
// cache temizleme
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize');
    echo "Cache temizlendi!";
});
Route::get('robots.txt', 'RobotsController');

Route::group(['prefix'=>'admin','middleware'=>'Admin'], function (){
    Route::get('/', 'AdminGetController@get_index');
    Route::get('/ayarlar', 'AdminGetController@get_ayarlar');
    Route::post('/ayarlar','AdminPos
    tController@post_ayarlar');
    Route::get('/hakkimizda','AdminGetController@get_hakkimizda');
    Route::post('/hakkimizda','AdminPostController@post_hakkimizda');

    Route::group(['prefix'=>'duyurular'], function (){
        Route::get('/','AdminGetController@get_duyuru');
        Route::post('/','AdminPostController@post_duyuru_sil');
        Route::post('/duyuru-ekle','AdminPostController@post_duyuru_ekle');
        Route::get('/duyuru-duzenle/{slug}','AdminGetController@get_duyuru_duzenle');
        Route::post('/duyuru-duzenle/{slug}','AdminPostController@post_duyuru_duzenle');
    });
    Route::group(['prefix'=>'referanslar'], function (){
       Route::get('/','AdminGetController@get_referanslar');
        Route::post('/referans-ekle','AdminPostController@post_referanslar');
        Route::post('/','AdminPostController@post_referans_sil');
        Route::get('/referans-duzenle/{slug}','AdminGetController@get_referans_duzenle');
        Route::post('/referans-duzenle/{slug}','AdminPostController@post_referans_duzenle');

    });
    Route::group(['prefix'=>'slider'], function (){
        Route::get('/','AdminGetController@get_slider');
        Route::post('/','AdminPostController@post_slider_sil');
        Route::post('/slider-ekle','AdminPostController@post_slider');
    });
    Route::group(['prefix'=>'kesiftalepleri'], function (){
        Route::get('/','AdminGetController@get_kesifTalebi');
        Route::post('/','AdminPostController@post_kesifTalebi_Sil');
    });
    Route::group(['prefix'=>'mesajlar'], function (){
        Route::get('/','AdminGetController@get_mesajlar');
        Route::post('/','AdminPostController@post_mesaj_sil');
    });
    Route::group(['prefix'=>'urunler'], function (){
        Route::get('/','AdminGetController@get_urunler');
        Route::post('/urun-ekle','AdminPostController@post_urun_ekle');
        Route::post('/','AdminPostController@post_urun_sil');
        Route::get('/urun-duzenle/{slug}','AdminGetController@get_urun_duzenle');
        Route::post('/urun-duzenle/{slug}','AdminPostController@post_urun_duzenle');

    });
    Route::group(['prefix'=>'markalar'], function (){
        Route::get('/','AdminGetController@get_markalar');
        Route::post('/marka-ekle','AdminPostController@post_marka_ekle');
        Route::post('/marka-sil','AdminPostController@post_marka_sil');
    });

});



Auth::routes();

Route::get('/anasayfa', 'HomeController@index')->name('anasayfa');
