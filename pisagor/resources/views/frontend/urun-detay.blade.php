@extends('frontend.app')
@section('baslik')
   Ürün Detayı
@endsection
@section('icerik')

    <meta name="keywords" content="{{$urun->keywords}}" />
    <meta name="description" content="{{$urun->description}}">
    <div role="main" class="main shop">

        <div class="container">

            <hr class="tall">

            <div class="row">
                <div class="col-md-9">

                    <div class="row">
                        <div class="col-md-6" id="urun-detay">

                            <div class="owl-carousel" data-plugin-options='{"items": 1}'>
                                @foreach(\App\Urunler_resim::where('urunID', $urun->id)->get() as $resim)
                                    <div>
                                        <ul class="thumbnail-gallery">
                                            <li><a href="/uploads/img/urunler/{{$resim->resim_Yol}}" title="{{$urun->UrunAdi}}" data-lightbox="urunler"><span class="thumbnail">
                                        <img alt="{{$resim->resim_alt}}" class="img-responsive  img-rounded" src="/uploads/img/urunler/{{$resim->resim_Yol}}">
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                @endforeach


                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="summary entry-summary">

                                <h1 class="shorter"><strong>{{$urun->UrunAdi}}</strong></h1>
                                <p class="price" style="text-align: center">
                                    <span class="amount">{{$urun->fiyat . "TL"}}</span>
                                </p>

                                <p class="taller">{{$urun->YogusmaTipi. ',' . $urun->maxVerim . ','. $urun->kapasite }} </p>

                                <div class="product_meta">
                                    <span class="posted_in" style="font-size: 15px;font-weight: bold">Markası  <a rel="tag" href="/urun-marka/{{$urun->markalar->marka_adi}}">  <img src="/uploads/img/markalar/{{$urun->markalar->resim_Yol}}" class="img-responsive" alt="{{$urun->markalar->resim_alt}}" ></a></span>

                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs tabs-product">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#productDescription" data-toggle="tab">Ürün Açıklaması</a></li>
                                    <li><a href="#productInfo" data-toggle="tab">Ürün Bilgileri/Özellikleri</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="productDescription">
                                       <p>{!! $urun->aciklama !!}</p>
                                          </div>
                                    <div class="tab-pane" id="productInfo">
                                        <table class="table table-striped push-top">
                                            <tbody>
                                            <tr>
                                                <th>
                                                    Yoğuşma Tipi :
                                                </th>
                                                <td>
                                                    {{$urun->YogusmaTipi}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Maksimum Verim
                                                </th>
                                                <td>
                                                    {{$urun->maxVerim}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Ürün Kapasitesi
                                                </th>
                                                <td>
                                                    {{$urun->Kapasite}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="tall" />

                    <div class="row">

                        <div class="col-md-12">
                            <h2>Benzer <strong>Ürünler</strong></h2>
                        </div>

                        <ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
                            @foreach(\App\Urunler::where('marka',$urun->marka)->get() as $urun)
                                @php
                                    $sayac = 0;
                                @endphp
                                <li class="col-md-4 col-sm-6 col-xs-12 product" style="margin-top: 50px">
                                    <span class="product-thumb-info">
											<a href="/urunler/urun-detay/{{$urun->slug}}">
												<span class="product-thumb-info-image">
													<span class="product-thumb-info-act">
														<span class="product-thumb-info-act-right"><em><i class="fa fa-search"></i> Detay</em></span>
													</span>

                                                        <ul class="thumbnail-gallery">
                                                               <img alt="{{$urun->resimler->resim_alt}}" class="img-responsive" src="/uploads/img/urunler/{{$urun->resimler->resim_Yol}}">
                                                        </ul>


												</span>
											</a>
											<span class="product-thumb-info-content">
												<a href="shop-product-sidebar.html">
													<h4>{{$urun->urun_adi}}</h4>
													<span class="price">
														<del><span class="amount">$325</span></del>
														<ins><span class="amount">$299</span></ins>
													</span>
												</a>
											</span>
										</span>
                                </li>

                            @endforeach

                        </ul>


                    </div>

                </div>
                @include('frontend.urunler-sidebar')
            </div>
        </div>

    </div>
@endsection

@section('css')
<style>
    .product_meta img{
        max-height: 110px;
        position: absolute;
        margin-top: -52px;
        margin-left: 79px;
    }
</style>
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
