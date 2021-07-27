<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <title>Pisagor Mühendislik | @yield('baslik')</title>

    <meta name="author" content="İdris ER, Hijar ER">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Pisagor Mühendislik | Doğalgaz" />
    <meta name="description" content="Mardin Kızıltepe'de Doğalgazınız Bizden Sorulur. Uzman Ekibimizle Hizmetinizdeyiz..." />
    <meta name="keywords" content="Mardin Doğalgaz, Kızıltepe Doğalgaz, akmercan, Doğalgaz, mardin doğalgaz aboneliği, Mardin, Kızıltepe,Kızıltepe doğalgaz Firmaları," />
    <meta name="owner" content="pisagormuhendislik" />
    <meta name="copyright" content="(c) 2019" />
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/frontend/vendor/bootstrap/bootstrap.css">

    <link rel="stylesheet" href="/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/frontend/vendor/magnific-popup/magnific-popup.css" media="screen">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/frontend/css/stil.css">

    <!-- sweetalert -->
    <link href="/css/sweetalert2.min.css" rel="stylesheet">
    <style>.swal2-popup{font-size: 1.5rem;}</style>
    @yield('css')


    <!-- Current Page CSS -->
    <link rel="stylesheet" href="/frontend/vendor/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="/frontend/vendor/circle-flip-slideshow/css/component.css" media="screen">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/frontend/css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/frontend/css/custom.css">

    <!-- Head Libs -->
    <script src="/frontend/vendor/modernizr/modernizr.js"></script>

    <!--[if IE]>
    <link rel="stylesheet" href="/frontend/css/ie.css">
    <![endif]-->

    <!--[if lte IE 8]>
    <script src="/frontend/vendor/respond/respond.js"></script>
    <script src="/frontend/vendor/excanvas/excanvas.js"></script>
    <![endif]-->
    {!! Robots::metaTag() !!}
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="favoritesModal"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="favoritesModalLabel" style="width: 100%;text-align: center">Keşif Başvuru Formu</h4>
            </div>
            <div class="modal-body">
                <form action="/kesifFormu" method="post" id="form">
                    {{csrf_field()}}
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad_soyad">Ad Soyad <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="ad_soyad" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="ad_soyad"  required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-Posta
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="mail" name="mail" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefon">Telefon <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="telefon" name="telefon" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="il">İl <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="il" name="il" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ilce">İlçe <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="ilce" name="ilce" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Adres
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="adres" name="adres" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Açıklama - Not
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="aciklama" name="aciklama" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-success" style="width: 30%">Kaydet</button>
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">İptal</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- /modal -->

<div class="body">
    <div id="ustDiv">
        <div class="logo">
            <a href="/">
                <img alt="Porto" data-sticky-width="240" data-sticky-height="60" src="/img/logos/pisagor.png">
            </a>
        </div>
    </div>

    <header id="header">

        <div class="container">
            <div class="logo">
                <a href="/">
                    <img alt="Porto" height="0" href="/" width="0" src="/img/logos/pisagor.png">
                </a>
            </div>
            <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <div class="topInformation">
                <div id="worktime" class="inform">
                    <i class="far fa-clock"></i>
                    <span>Hafta içi: 09.00 - 19.00</span><br>
                    <span>C.tesi : 09.00 - 18.00</span>
                </div>
                <div id="phone" class="inform">
                    <i class="fal fa fa-mobile-alt "></i>
                    <span>0542 795 2463</span><br>
                    <span>0542 367 4959</span>
                </div>
                <div id="place" class="inform">
                    <i class="fal fa fa-map-marker-alt"></i>
                    <span>Konumumuz</span><br>
                    <span>Kızıltepe / Mardin</span>
                </div>
            </div>
        </div>

        <div class="navbar-collapse nav-main-collapse collapse">
            <div class="container">

                <nav class="nav-main mega-menu">
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                        <li>
                            <a href="/">Anasayfa</a>
                        </li>
                        <li>
                            <a href="/hakkimizda">Hakkımızda</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">
                                Hizmetler
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/hizmetler/dogalgaz-tesisati">Doğalgaz Tesisatı</a></li>
                                <li><a href="/hizmetler/mekanik-tesisat">Mekanik Tesisat</a></li>
                                <li><a href="/hizmetler/klima-sistemleri">Klima Sistemleri</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/referanslar">Referanslar</a>
                        </li>
                        <li>
                            <a href="/urunler">Ürünler</a>
                        </li>
                        <li>
                            <a href="/duyurular">Duyurular</a>
                        </li>

                        <li>
                            <a href="/iletisim">Bize Ulaşın</a>
                        </li>

                        <li class="mdl">
                            <button type="button"   class="btn btn-outline-primary kesif" data-toggle="modal" data-target="#favoritesModal" >Ücretsiz Keşif <i class="fa fa-angle-right"></i> </button>
                        </li>

                        <li class="social" style="float: right;"><a href="https://www.instagram.com/pisagormuhendislik" target="_blank"><i class="fab fa-instagram" style="color:#C13584"></i> </a> </li>
                        <li class="social" style="float: right;"><a href="https://www.facebook.com/pisagormuhendislik" target="_blank"><i class="fab fa-facebook-square" style="color:blue"></i></a> </li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>


    @yield('icerik')


    <footer id="footer" class="light">
        <div class="container">
            <div class="row">

                <div class="col-md-5">
                    <div class="newsletter">
                        <img src="/img/logos/pisagor.png" class="img-responsive">
                        <div style="margin-top: 25px;border-top: 1px solid;width: 60%;">
                            <h2 class="shorter word-rotator-title">
                                <strong>
									<span class="word-rotate active" data-plugin-options="{&quot;delay&quot;: 3500, &quot;animDelay&quot;: 400}">
										<span class="word-rotate-items" style="width: 105px; top: 0px; overflow: hidden;">
											<span>Güvenilir ve Hızlı Hizmet</span>
										    <span>Donanımlı Ekip</span></span>
										    <span>Alanında Öncü Firmalardan</span></span>
									</span>
                                </strong>

                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contact-details">
                        <h4>Bize Ulaşın</h4>
                        <ul class="contact">
                            <li><p><i class="fa fa-map-marker"></i> <strong>Adres:</strong>{{$ayar->adres .' '. $ayar->ilce .'/'.$ayar->il}} Tepebaşı mah. 699/A sok. Batu İnşaat 14 altı No:20 Kızıltepe/Mardin</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>Telefon:</strong> {{$ayar->tel}}</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>Telefon:</strong> {{$ayar->tel2}}</p></li>
                            <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:{{$ayar->mail}}">{{$ayar->mail}}</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <h4>Bizi Takip Edin</h4>
                    <div class="social-icons">
                        <ul class="social-icons">
                            @if($ayar->facebook)
                            <a href="{{$ayar->facebook}}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <li class="facebook"><a href="{{$ayar->facebook}}" target="_blank" data-placement="bottom" data-tooltip title="Facebook">Facebook</a></li>
                           @endif
                            @if($ayar->instagram)
                                    <a href="{{$ayar->instagram}}">

                                        <i class="fab fa-instagram"></i>
                                    </a>
                            <li class="instagram"><a href="{{$ayar->instagram}}" target="_blank" data-placement="bottom" data-tooltip title="instagram">instagram</a></li>
                            @endif
                                @if($ayar->twitter)
                                    <a href="{{$ayar->twitter}}">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <li class="twitter"><a href="{{$ayar->twitter}}" target="_blank" data-placement="bottom" data-tooltip title="Twitter">Twitter</a></li>
                                @endif
                                @if($ayar->youtube)
                            <a href="{{$ayar->youtube}}">
                                <i class="fab fa-youtube fa-3x" style="margin-top: -5px;margin-left: 0px !important;"></i>
                            </a>
                            <li class="youtube"><a href="{{$ayar->youtube}}" target="_blank" data-placement="bottom" data-tooltip title="Youtube">Youtube</a></li>
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-xs-8">
                        <p>© Copyright 2019. Tüm Hakları Saklıdır</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <nav id="sub-menu">
                            <ul>
                                <li><a href="/sitemap" target="_blank">Sitemap</a></li>
                                <li><a href="/iletisim">İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Vendor -->

<script src="/frontend/vendor/jquery/jquery.js"></script>
<script src="/frontend/vendor/jquery.appear/jquery.appear.js"></script>
<script src="/frontend/vendor/jquery.easing/jquery.easing.js"></script>
<script src="/frontend/vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="/frontend/vendor/bootstrap/bootstrap.js"></script>
<script src="/frontend/vendor/common/common.js"></script>
<script src="/frontend/vendor/jquery.validation/jquery.validation.js"></script>
<script src="/frontend/vendor/jquery.stellar/jquery.stellar.js"></script>
<script src="/frontend/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/frontend/vendor/jquery.gmap/jquery.gmap.js"></script>
<script src="/frontend/vendor/isotope/jquery.isotope.js"></script>
<script src="/frontend/vendor/owlcarousel/owl.carousel.js"></script>
<script src="/frontend/vendor/jflickrfeed/jflickrfeed.js"></script>
<script src="/frontend/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/frontend/vendor/vide/vide.js"></script>
<script src="/public/fontawesome/js/fontawesome.min.js"></script>
<script src="/public/fontawesome/js/all.js"></script>
    @yield('js')
<!-- Theme Base, Components and Settings -->
<script src="/frontend/js/theme.js"></script>

<!-- Specific Page Vendor and Views -->
<script src="/frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/frontend/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="/frontend/js/views/view.home.js"></script>

<!-- Theme Custom -->
<script src="/frontend/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/frontend/js/theme.init.js"></script>

<!-- sweetalert -->
<script src="/js/jquery.form.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/messages_tr.min.js "></script>
<script src="/js/sweetalert2.min.js "></script>


<!-- alert -->
<script>
    $(document).ready(function () {
        $('form').validate();
        $('form').ajaxForm({
            beforeSubmit:function () {

                Swal.fire({
                    title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    showConfirmButton: false,
                    text: 'Yükleniyor Lütfen Bekleyiniz...',
                })

            },
            beforeSerialize: function(){
            },
            success:function (response) {
                if (response.durum == 'success') {
                    Swal.fire({
                        title: response.icerik,
                        text: '',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#ff4b07',
                        confirmButtonText: 'Tamam',
                    }).then(function (result) {
                        if (result.value) {
                            setTimeout (window.location.reload());
                        }
                    });
                }else{
                    Swal.fire(
                        response.baslik,
                        response.icerik,
                        response.durum
                    )
                }
            }
        });
    });
</script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-12345678-1']);
    _gaq.push(['_trackPageview']);

    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
 -->

</body>
</html>
