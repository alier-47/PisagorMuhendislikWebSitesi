@extends('frontend.app')
@section('baslik')
    Duyuru Detayı
@endsection
@section('icerik')
    <div role="main" class="main">

        <section class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="/">Anasayfa</a></li>
                            <li><a href="/duyurular">Duyurular</a> </li>
                            <li class="active">{{$duyuru->slug}}</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Duyuru</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts single-post">

                        <article class="post post-large blog-single-post">
                            <div class="post-image">
                                <div class="owl-carousel" data-plugin-options='{"items":1}'>
                                    @foreach(\App\Resimler::where('duyuruID', $duyuru->id)->get() as $resim)
                                    <div>
                                        <div class="img-thumbnail">
                                            <img class="img-responsive" src="/uploads/img/duyuru/{{$resim->resim_Yol}}" alt="" style="max-height: 350px">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="post-date">
                                <span class="day">{{$duyuru->dateDay()}}</span> <!-- Duyurular Modelinde Tanımlanmıştır  -->
                                <span class="month">{{$duyuru->dateMonth()}}</span> <!-- Duyurular Modelinde Tanımlanmıştır  -->
                            </div>

                            <div class="post-content" style="word-break: break-all">

                                <h2>{{$duyuru->baslik}}</h2>

                                <p>{!!$duyuru->icerik!!}</p>

                                <div class="post-block post-share">
                                    <h3><i class="fa fa-share"></i>Duyuruyu Paylaş</h3>

                                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style ">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                        <a class="addthis_button_pinterest_pinit"></a>
                                        <a class="addthis_counter addthis_pill_style"></a>
                                    </div>
                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                                    <!-- AddThis Button END -->

                                </div>
                            </div>
                        </article>

                    </div>
                </div>

                @include('frontend.duyuru-side-bar')
            </div>

        </div>

    </div>

    @endsection
@section('css')
    <link href="/css/sweetalert2.min.css" rel="stylesheet">
    <style>.swal2-popup{font-size: 1.5rem;}</style>
    @endsection
@section('js')
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js "></script>
    <script src="/js/sweetalert2.min.js "></script>

    <script>

        function altyorum(id){
            var hidden = '<input type="hidden" value="'+id+'" name="ust_yorum">'
            document.getElementById('altyorum').innerHTML = hidden;
        }



        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit:function () {

                },
                success:function (response) {
                    Swal.fire(
                        response.baslik,
                        response.icerik,
                        response.durum
                    );
                    if (response.durum == 'success'){
                        var isim = document.getElementById('isim').value;
                        var icerik = document.getElementById('icerik').value;
                        var mesaj = '<div class="comment">'+
                            '<div class="img-thumbnail">'+
                            '<img class="avatar" alt="" src="img/avatar-2.jpg">'+
                            '</div>'+
                            '<div class="comment-block">'+
                            '<div class="comment-arrow">'+
                            '</div>'+
                            '<span class="comment-by">'+
                            '<strong>'+ isim + '</strong>'+
                            '<span class="pull-right">'+
                            '</span>'+
                            '<a href="#"><i class="fa fa-reply"></i> Reply </a>'+
                            '</span>'+
                            '</span>'+
                            '</span>'+
                            '<p>'+ icerik + '</p>'+
                            '<span class="date pull-right">Şimdi</span>'+
                            '</div>'+
                            '</div>';
                        document.getElementById('yorumlar').innerHTML = mesaj;

                    }
                }
            });
        });
    </script>
    @endsection
