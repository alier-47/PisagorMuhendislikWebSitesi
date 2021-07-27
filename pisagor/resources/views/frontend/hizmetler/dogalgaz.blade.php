@extends('frontend.app')
@section('icerik')
    <section class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Bireysel Doğalgaz Sistemleri</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="hizmet">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <h4>Hizmetlerimiz</h4>
                    <ul>
                        <li class="psg"><a href="/hizmetler/dogalgaz-tesisati" style="color: darkred;">Doğalgaz Tesisatı</a> </li>
                        <li class="psg"><a href="/hizmetler/mekanik-tesisat" >Mekanik Tesisat</a></li>
                        <li class="psg"><a href="/hizmetler/klima-sistemleri">Klima Sistemleri</a></li>
                    </ul>

                </div>
                <div class="col-md-9 col-sm-9">
                    <img src="/img/kaynak/dogalgaz-tesisati.jpg" alt="dogalgaz-tesisati" class="img-responsive">
                    <p>
                        Pisagor Mühendislik olarak, hayatı kolaylaştıran doğalgazı aktif bir şekilde kullanabilmeniz için siz değerli müşterilerimizin evlerine ve işyerlerine çekiyoruz. Donanımlı, bilgili ve sertifikalı ustalarımız ile müşterilerimizin memnuniyetini gözönünde bulundurarak çalışmalar yapmaktayız.
                    </p>
                    <p>
                        Bu süreçte gaz açma yetkisine sahip mühendisimiz ve uzman kadromuz hep birlikte çalışıp müşterinin istekleri doğrultusunda çalışma yürütmekteyiz. Mühendisimiz müşteri ile iletişimde olup, müşterimilerimizin ev veya işyerleri için en uygun plan yapılmakta ve en uygun Kombiler önerilmektedir.
                    </p>
                    <p>
                        Sizde iyi ve kaliteli bir hizmet almak istiyorsanız lütfen bizimle iletişime geçebilirsiniz veya dilerseniz ücretsiz keşif formunu doldurun biz size dönüş yapalım
                    </p>
                    <span class="mdl">
                            <button type="button"   class="btn btn-outline-primary kesif" data-toggle="modal" data-target="#favoritesModal" >Ücretsiz Keşif Formu <i class="fa fa-angle-right"></i> </button>
                    </span>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')


@endsection

@section('js')

@endsection
