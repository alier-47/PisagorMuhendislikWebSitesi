@extends('frontend.app')
@section('baslik')
   Duyurular
@endsection
@section('icerik')

    <div role="main" class="main">

        <section class="page-top">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h1>Duyurular</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="duyuru-posts">

                        @foreach($duyurular as $duyuru)

                        <article class="post post-large">
                            <div class="post-image" style="max-height: 385px">
                                <div class="owl-carousel" data-plugin-options='{"items":1}' style="z-index: 0">
                                    @foreach(\App\Resimler::where('duyuruID', $duyuru->id)->get() as $resim)
                                    <div>
                                        <div class="img-thumbnail">
                                            <img class="img-responsive img-responsive" src="/uploads/img/duyuru/{{$resim->resim_Yol}}" alt="" style="max-height: 285px">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="post-date">
                                <span class="day">{{$duyuru->dateDay()}}</span> <!-- Duyurular Modelinde Tanımlanmıştır  -->
                                <span class="month">{{$duyuru->dateMonth()}}</span> <!-- Duyurular Modelinde Tanımlanmıştır  -->
                            </div>

                            <div class="post-content" style="position: sticky;z-index: 2">

                                <h2> <a href="/duyurular/{{$duyuru->slug}}">{{$duyuru->baslik}}</a></h2>

                                <p>
                                    @php
                                        if( strlen($duyuru->icerik) >250)
                                    {
                                        echo mb_substr($duyuru->icerik,0,250).'...';
                                    }else{
                                        {{$duyuru->icerik; }}
                                   }
                                    @endphp
                                </p>
                            </div>
                        </article>
                        @endforeach

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$duyurular->links()}}
                                </div>
                            </div>

                    </div>
                </div>

            @include('frontend.duyuru-side-bar')
            </div>

        </div>

    </div>

    @endsection
@section('css')
    @endsection
@section('js')
    @endsection
