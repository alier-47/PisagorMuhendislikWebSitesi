@extends('frontend.app')
@section('baslik')
    Kombi Klima Doğalgaz
    @endsection
@section('icerik')
    <div role="main" class="main">

        <!-- Slider  -->
        <div id="slider">
        <div class="slider-container">
            <div class="slider" id="revolutionSlider" data-plugin-revolution-slider data-plugin-options='{"startheight": 500}'>

                <ul>

                    @foreach($sliders as $slider)
                    <li data-transition="fade" data-slotamount="13" data-masterspeed="300" >
                        <img src="{{ asset('uploads/img/slider/'.$slider->resim_Yol) }}" alt="{{$slider->resim_alt}}" class="img-responsive">
                    </li>


                    @endforeach

                </ul>

            </div>
        </div>
        </div>

        <hr style="width: 100%">
        <!-- Hizmetler  -->
        <section id="service">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-3 col-xs-3"><h3>Hizmetlerimiz</h3></div>
                    <div class="col-md-9 col-xs-9"></div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center" style="padding: 20px;" >
                        <div class="module">
                            <div class="thumb">
                                <img src="/img/home/work-2.jpg" class="img-responsive" style="height: 255px;">
                            </div>
                            <h3 style="margin-top: 20px"><a href="/hizmetler/dogalgaz-tesisati" target="_blank">Doğalgaz Tesisatı</a> </h3>
                            <p>Profesyonel Ekibimizle 2 yıldan beri siz değerli müşterilemiz için çalışmaktayız. Doğalgaz Tesisatınızın planlanmasından bitimine kadar tüm çalışma arkadaşlarımız titizlikle çalışmaktadır.</p>
                        </div>

                    </div>
                    <div class="col-md-4 text-center" style="padding: 20px;" >
                        <div class="module">
                            <div class="thumb">
                                <img src="/img/mekanik-tesisat.jpg" class="img-responsive" style="height: 255px;">
                            </div>
                            <h3 style="margin-top: 20px"><a href="/hizmetler/mekanik-tesisat" target="_blank">Mekanik Tesisat</a></h3>
                            <p>Yaşam standartınız ve konforonuz için çalışmalara başladık. Konforlu bir yaşam istiyorsanız doğru adrestesiniz...
                        </div>

                    </div>
                    <div class="col-md-4 text-center" style="padding: 20px;" >
                        <div class="module">
                            <div class="thumb">
                                <img src="/img/home/work-2.jpg" class="img-responsive" style="height: 255px;">
                            </div>
                            <h3 style="margin-top: 20px"><a href="/hizmetler/klima-sistemleri" target="_blank">Klima Sistemleri</a></h3>
                            <p>Firmamız bünyesinde her türlü klima satışı mevcuttur. Size en uygun klimayı almak için bizimle iletişime geçebilirsiniz. </p>
                        </div>

                     </div>
                </div>
            </div>
        </section>
        <hr style="width: 100%">
        <!-- Proje Aşamaları  -->
        <section id="project_stages2">
        <div class="container">
            <div class="row">
                <h3>PROJE AŞAMALARI </h3>
            </div>
            <div class="row featured-boxes">
                <div class="col-md-3 col-xs-6">
                    <div class="featured-box featured-box-primary">
                        <div class="box-content">
                            <i class="icon-featured fa fa-handshake"></i>
                            <h4>Ücretsiz Keşif</h4>
                            <p>Profesyonel ekiplerimizin ziyaretiyle siz değerli müşterilerimizin talepleri doğrultusunda ve çalışmanın yapılacağı yere göre projenizin ön hazırlık aşaması gerçekleşir</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="featured-box featured-box-secundary">
                        <div class="box-content">
                            <i class="icon-featured fa fa-book"></i>
                            <h4>Fiyat Taslak</h4>
                            <p>Sizin için Proje taslağı çıkarılır ve çalışma yapılacak yerin büyüklüğüne göre(kullanılacak malzeme durumuna göre) size bir fiyat teklifi sunulur. Kabul ettiğiniz takdirde diğer aşamalara geçilir.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="featured-box featured-box-tertiary">
                        <div class="box-content">
                            <i class="icon-featured fa fa-code-branch"></i>
                            <h4>Proje Çizimi</h4>
                            <p>Bu aşamada uzman mühendis projenizi çizer yetkili kuruma gönderir ve takibini gerçekleştirir. Projeniz onaylandığı zaman sizi bilgilendirmek için ekiplerimiz size ulaşacaktır.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="featured-box featured-box-quartenary">
                        <div class="box-content">
                            <i class="icon-featured fa fa-cogs"></i>
                            <h4>Zamanında Teslimat</h4>
                            <p>Tüm işlemler bittikten sonra gaz dağıtıcı firma tarafından size verilen tarihte(bu tarih size mesaj yoluyla iletilmektedir) ekibimiz son testleri gerçekleştirir ve gaz dağıtıcı firmanın mühendisi ile bizim uzman mühendisin onayı ile gazınız bırakılır. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <hr style="width: 100%">

        <section id="kesifFormu">
            <div class="container-fluid">
                <div class="row">

                    <div class="col">
                        <span>Ücretsiz Keşif Hizmetimizden Yararlanmak İçin Lütfen Formu Doldurunuz ==>
                                 <input type="button"  class="btn"  data-toggle="modal" data-target="#favoritesModal" value="Keşif Formu"></span>
                    </div>
                </div>
            </div>
        </section>
        <hr style="width: 100%">

        <!--  Tercih Edenler  -->
        <section id="our-work">
            <div class="container">
                <div class="row title" style="padding: 20px;">
                   <h2>BİZİ TERCİH EDENLER</h2>
                </div>
                <div class="row featured-boxes">
                    <div class="col-md-12 text-center">

                        <div class="owl-carousel owl-carousel-spaced" data-plugin-options='{"items": 4}'>
                            @foreach($referanslar as $referans)
                            <div>
                                <div class="portfolio-item img-thumbnail">

                                    <a href="/referanslar/{{$referans->slug}}"  target="_blank">
                                        <img src="/uploads/img/binalar/{{$referans->resim->resim_Yol}}" class="img-responsive thumbnail" alt="{{$referans->resim->resim_alt}}" style="height: 227px;width: 227px">
                                    </a>
                                    <p style="width: 100%;text-align: center;color: #0a0a0a;font-weight: bold">{{$referans->bina_adi}} Apartmanı</p>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </section>
        <hr style="width: 100%;height: 5px">
        <!-- Biz Kimiz  -->
        <section id="biz">
           <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-9">
                    <h2><strong>Biz</strong> Kimiz</h2>
                    <h3>Pisagor Mühendislik</h3>
                    <div style="background-color: red;height: 3px;width: 65%;margin-top: 10px"></div>
                    <p style="color: #000;font-size: 15px">2017 yılında kurulan firmamız uzman ekibimizle kısa sürede öncü firmalardan biri haline gelmiştir. Mardin Kızıltepe'de doğalgaz alanında aktif bir şekilde çalışma yürütmekteyiz. Çalışmalarımızda kaliteden ödün vermemekteyiz. Firmamız müşteri memnuniyetini düşünerek uzman ekibimizle konutlarda doğalgaz ihtiyaçlarını çözümleyerek, doğalgaz sistemine son haliniz vermekteyiz. </p>
                    <p style="color: #000;font-size: 15px"> Pisagor Mühendislik olarak bünyemizde Doğalgaz Tesisatı, Mekanik Tesisat, Klima Satışı, Proje Çizimi hizmetlerini vermekteyiz. </p>
                    <p style="color: #000;font-size: 15px"> Sağlam temellerle büyümeyi hedef alan Pisagor Mühendislik,Birçok hizmet noktasıyla her geçen büyüme çizgisini arttırmaktadır. </p>
                    <p style="color: #000;font-size: 15px">Pisagor Mühendislik olarak siz değerli müşterilerimizin memnuniyetinden ve pozitif enerjiden hiç yorulmadan bıkmadan hizmetimizi sürdürmekteyiz.  </p>
                </div>
                <div class="col-md-6 col-xs-3">
                    <img src="/img/home/pisagormuhendislik.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
        </section>
        <hr style="width: 100%">

        <!-- Duyurular  -->

        <section id="announcements">

            <div class="container text-center">

                <div class="row" style="padding: 20px;">
                    <div class="col-md-4 col-xs-3" style="padding: 5px;background-color: #bbb5b5;"></div>
                    <div class="col-md-4  col-xs-6" style="margin-top: -8px;text-align: center; font-size: 22px;color: white">BİZDEN HABERLER</div>
                    <div class="col-md-4  col-xs-3" style="padding: 5px;background-color: #bbb5b5;"></div>
                </div>
                <div class="row">
                    @foreach($duyurular as $duyuru)
                    <div class="col-md-6">
                        <div class="featured-box">
                            <div class="box-content">
                                <a href="/duyurular/{{$duyuru->slug}}" target="_blank" >
                                    <img src="/uploads/img/duyuru/{{$duyuru->resim->resim_Yol}}" class="img-responsive thumbnail" alt="{{$duyuru->resim->resim_alt}}">
                                </a>
                                <h4><strong>{{$duyuru->baslik}}</strong></h4>
                               <p>{!! substr($duyuru->icerik,0,250)!!}</p>
                            </div>
                            <a href="/duyurular/{{$duyuru->slug}}" class="btn btn-danger" target="_blank">Devamını Oku</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </section>

        <section id="product">
            <div class="container-fluid ">
                <div class="row bgtitle">
                    <h3>Ürünlerimizden Bazıları</h3>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach($urunler as $urun)
                    <div class="col-md-4 col-xs-6 text-center">
                            <a href="/urunler/urun-detay/{{$urun->slug}}" target="_blank">
                                <img src="/uploads/img/urunler/{{$urun->resimler->resim_Yol}}" alt="{{$urun->resimler->resim_alt}}" class="img-responsive">
                                {{$urun->urun_adi}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Referanslar  -->
        <section id="referances">
        <div class="container">

            <hr class="tall" />
            <div class="row center">
                <div class="owl-carousel" data-plugin-options='{"items": 6, "autoplay": true, "autoplayTimeout": 3000}'>
                    <div>
                        <img class="img-responsive" src="img/logos/viessmann.png" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="img/logos/vaillant.png" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="img/logos/buderus.png" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="img/logos/bosch.png" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="img/logos/demirdokum.png" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="img/logos/ariston.jpg" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="img/logos/eca.png" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="img/logos/baymak.png" alt="">
                    </div>
                </div>
            </div>

        </div>
        </section>

    </div>

@endsection()

@section('css')
    <style>
        #announcements .btn-danger:hover{
            background-color: #00a797 !important;
            border-color: #00a797 !important;
            transition: 3ms all;
        }
    </style>
    <!-- Datatables -->
    <link href="/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/css/lightbox.min.css">
@endsection
@section('js')
    <script src="/backend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/backend/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="/lightbox/js/lightbox.min.js"></script>


    <script src="/js/ckeditor/ckeditor.js "></script>
    <script src="/js/ckeditor/config.js"></script>



@endsection
