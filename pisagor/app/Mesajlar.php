<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesajlar extends Model
{
    protected $table = 'mesajlar';
    protected $fillable= [
        'adsoyad',
        'mail',
        'telefon',
        'mesaj'
    ];
}
