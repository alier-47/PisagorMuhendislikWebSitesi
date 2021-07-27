@extends('frontend.app')
@section('baslik')
    Tüm Ürünler
@endsection
@section('icerik')
    <div role="main" class="main shop">

        <div class="container">

            <hr class="tall">

            <div class="row">
                <div class="col-md-9">

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="shorter"><strong>Kombi ve Klima Çeşitleri</strong></h3>
                        </div>
                    </div>

                    <div class="row">

                        <ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
                            @foreach($urunler as $urun)
                                @php
                                    $sayac = 0;
                                @endphp
                                <li class="col-md-3 col-sm-6 col-xs-6 product">
                                    <span class="product-thumb-info">
											<a href="/urunler/urun-detay/{{$urun->slug}}">
												<span class="product-thumb-info-image">
													<span class="product-thumb-info-act">
														<span class="product-thumb-info-act-right"><em><i class="fa fa-search"></i> Detay</em></span>
													</span>

                                                 @foreach(\App\Urunler_resim::where('urunID', $urun->id)->get() as $resim)
                                                     @if($sayac === 0)
													<img alt="" class="img-responsive" src="/uploads/img/urunler/{{$resim->resim_Yol}}">
                                                    @endif
                                        @php $sayac++  @endphp
                                        @endforeach

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


                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{$urunler->links()}}
                        </div>
                    </div>
                </div>

                @include('frontend.urunler-sidebar')

            </div>
        </div>

    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
