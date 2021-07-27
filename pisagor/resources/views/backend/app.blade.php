<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{csrf_token()}}">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/backend/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/backend/build/css/custom.min.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    @yield('css')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="/admin/"><i class="fa fa-home"></i> Anasayfa </a></li>
                            <li><a href="/admin/ayarlar"><i class="fa fa-cogs"></i> Ayarlar</a></li>
                            <li><a href="/admin/duyurular"><i class="fa fa-book"></i> Duyurular</a></li>
                            <li><a href="/admin/urunler"><i class="fa fa-product-hunt"></i> Ürünler ve Markalar</a></li>
                            <li><a href="/admin/referanslar"><i class="fa fa-building"></i> Referanslar</a></li>
                            <li><a href="/admin/slider"><i class="fa fa-sliders"></i> Slider</a></li>
                            <li><a href="/admin/hakkimizda"><i class="fa fa-users"></i> Hakkımızda  </a></li>
                            <li><a href="/admin/kesiftalepleri"><i class="fa fa-book"></i> Keşif Talepleri  </a></li>
                            <li><a href="/admin/mesajlar"><i class="fa fa-book"></i> Mesajlar  </a></li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>{{ __('Çıkış') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        @yield('icerik')


    </div>
</div>

<!-- jQuery -->
<script src="/backend/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/backend/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/backend/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="/backend/build/js/custom.min.js"></script>
@yield('js')
</body>
</html>
