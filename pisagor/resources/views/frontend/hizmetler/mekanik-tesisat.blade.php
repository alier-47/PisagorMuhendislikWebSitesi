@extends('frontend.app')
@section('icerik')
    <style>
        .page-top{
            background: url("/img/kaynak/bg1.jpg") center center no-repeat;
            background-size: cover;
        }
    </style>
    <section class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Mekanik Tesisat</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="hizmet">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <h4>Hizmetlerimiz</h4>
                    <ul>
                        <li class="psg"><a href="/hizmetler/dogalgaz-tesisati">Doğalgaz Tesisatı</a> </li>
                        <li class="psg"><a href="/hizmetler/mekanik-tesisat" style="color: darkred;">Mekanik Tesisat</a></li>
                        <li class="psg"><a href="/hizmetler/klima-sistemleri">Klima Sistemleri</a></li>
                    </ul>

                </div>
                <div class="col-md-9 col-sm-9">
                   <div id="mekanik" style="padding: 20%;border-left: 1px solid;">
                       <h1>Sayfamız Yapım Aşamasındadır</h1>
                   </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')


@endsection

@section('js')

@endsection
