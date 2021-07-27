@extends('frontend.app')
@section('baslik')
    Hakkımızda
@endsection
@section('icerik')
<div role="main" class="main">

    <section class="page-top">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Hakkımızda</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <h2 class="word-rotator-title">
             <strong>
							<span class="word-rotate" data-plugin-options='{"delay": 2000}'>
								<span class="word-rotate-items">
									<span>Konforunuz içi çalışıyoruz</span>
									<span>Güvenilir ve Hızlı Hizmet</span>
									<span>Uzman Ekip</span>
								</span>
							</span>
            </strong>
        </h2>
        <div class="row">
            <div class="col-md-8">
                <h3><strong>Pisagor Mühendislik</strong></h3>
                <p>
                    {!! $hakkimizda->icerik !!}
                </p>
            </div>

        </div>

        <hr class="tall">

        <div class="row">
            <div class="col-md-12">
                <h3 class="push-top"><strong>Vizyonumuz</strong></h3>
            </div>
        </div>
        <div class="featured-box featured-box-secundary">
            <div class="box-content">
                {{$hakkimizda->vizyon}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="push-top"><strong>Misyonumuz</strong></h3>
            </div>
        </div>
        <div class="featured-box featured-box-secundary">
            <div class="box-content">
                {{$hakkimizda->misyon}}
            </div>
        </div>
    </div>

</div>
    @endsection

@section('css')
    @endsection
@section('js')
    @endsection  
