@extends('frontend.app')
@section('baslik')
    Referans Detayı
@endsection
@section('icerik')
    <section class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{$referans->bina_adi}}</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container referans">
        <div class="row">
            <div class="col-md-9">
                <h3>Yapılan İşler</h3>
                <ul>
                    @php
                        $isler = explode(',',$referans->yapilan_isler);
                         $sayac =0;
                    @endphp
                    @foreach($isler as $is)
                        @php $sayac++@endphp
                        <li><i class="fa fa-angle-right"></i> {{$is}}</li>
                    @endforeach
                </ul>
                <ul class="thumbnail-gallery">
                    {{\App\Referanslar::getResim($referans->id)}}
                </ul>
            </div>
            <div class="col-md-3">
                <h3 style="font-weight: 600">Tüm Referanslar</h3>
                <ul>
                    @foreach($tumReferanslar as $ref)
                    <li><a href="/referanslar/{{$ref->slug}}"><i class="fa fa-angle-double-right"></i> {{$ref->bina_adi}}</a> </li>
                        @endforeach
                </ul>
            </div>

        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.thumbnail-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title');
                    }
                }
            });
        });
    </script>
@endsection
