@extends('frontend.app')
@section('baslik')
  Referanslar
@endsection
@section('icerik')

    <style>
        .header{
            height: 150px;
            background: url("/img/patterns/bg.jpg") center center fixed;
            padding-left: 65px;
        }
        .header h3 {
            line-height: 150px;
            padding-left:50px ;
            color: white;
            font-weight: bold;
        }
        .header .fa-angle-double-right{
            line-height: 150px;
            font-size: 25px;
        }
    </style>

    <div class="container-fluid" style="padding: 0;">
        <div class="header">
           <h3><i class="fa fa-angle-double-right"></i> Referanslarımız</h3>
        </div>
    </div>
    <div class="container hizmetler">
        <div class="row featured-boxes">

                    @foreach($referanslar as $referans)
                        <div class="col-md-3 col-xs-6">
                            <div class="portfolio-item img-thumbnail">

                                <a href="/referanslar/{{$referans->slug}}" >
                                    <img src="/uploads/img/binalar/{{$referans->resim->resim_Yol}}" class="img-responsive thumbnail" alt="{{$referans->resim->resim_alt}}">
                                </a>
                                <p style="width: 100%;text-align: center;color: #0a0a0a;font-weight: bold">{{$referans->bina_adi}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
        <div class="row">
            <div class="col-md-12 text-center">
                {{$referanslar->links()}}
            </div>
        </div>
    </div>


@endsection

@section('css')


@endsection

@section('js')

@endsection
