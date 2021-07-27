<?php

namespace App;

use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    protected $table = 'kategoriler';
    protected $fillable = ['ad','ust_kategori','slug'];

    public function parent(){
        return $this->belongsTo('App\Kategoriler','ust_kategori');
    }
    public function children(){
        return $this->hasMany('App\Kategoriler','ust_kategori');
    }
    public function bloglar(){
        return $this->hasMany('App\Duyurular','kategori', 'id');
    }

    //Sınırsız Kategori için Kullanılacak
    public static function getKategoriler($parent = 0, $string = '-2'){
        $kategoriler = Kategoriler::where('ust_kategori', '=', $parent)->get();

        $string = $string+2;
        foreach($kategoriler as $kategori){
                echo '<option value="' . $kategori->id . '">'. str_repeat('-', $string) . $kategori->ad .'</option>';
                Kategoriler::getKategoriler($kategori->id, $string);
        }

    }
}
