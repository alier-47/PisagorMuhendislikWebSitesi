@extends('frontend.app')
@section('baslik')
    Bize Ulaşın
@endsection
@section('icerik')
<div role="main" class="main">

    <section class="page-top">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Bize Ulaşın </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-md-6">

                <div class="alert alert-success hidden" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>

                <div class="alert alert-danger hidden" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                </div>

                <h2 class="short"><strong>İletişim</strong> </h2>
                <form id="form" action="/mesaj-gonder" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Adınız *</label>
                                <input type="text" value="" maxlength="100" class="form-control" name="adsoyad" id="adsoyad" required>
                            </div>
                            <div class="col-md-6">
                                <label>Mail Adresiniz *</label>
                                <input type="email" value="" maxlength="100" class="form-control" name="mail" id="mail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Telefon Numaranız</label>
                                <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="telefon" id="subject" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Mesajınız *</label>
                                <textarea maxlength="5000" rows="10" class="form-control" name="mesaj" id="mesaj" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Mesajı Gönder" class="btn btn-primary btn-lg" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">

                <h4><strong>Bize </strong> Ulaşmak İçin</h4>
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker"></i> <strong>Adres:</strong> {{ $ayarlar->adres }} {{$ayarlar->il}}/{{$ayarlar->ilce}}</li>
                    <li><i class="fa fa-phone"></i> <strong>Telefon:</strong> {{ $ayarlar->tel }}</li>
                    @if($ayarlar->tel2)
                        <li><i class="fa fa-phone"></i> <strong>Telefon:</strong> {{ $ayarlar->tel2 }}</li>
                        @endif
                    @if($ayarlar->faks)
                    <li><i class="fa fa-phone"></i> <strong>Faks:</strong> {{ $ayarlar->faks }}</li>
                    @endif
                    <li><i class="fa fa-envelope"></i> <strong>E-posta:</strong> <a href="mailto:{{$ayarlar->mail}}">{{$ayarlar->mail}}</a></li>
                </ul>

                <hr />

                <h4><strong>Sosyal Medya</strong> Hesaplarımız</h4>
                <ul class="social-icons">
                    @if($ayarlar->facebook)
                        <li><a href="{{$ayarlar->facebook}}" target="_blank" data-placement="bottom"><i class="fab fa-facebook-square fa-3x fb"></i></a></li>
                    @endif
                        @if($ayarlar->instagram)
                    <li ><a href="{{$ayarlar->instagram}}" target="_blank" data-placement="bottom"><i class="fab fa-instagram fa-3x ins"> </i></a></li>
                        @endif
                        @if($ayarlar->twitter)
                    <li><a href="{{$ayarlar->twitter}}" target="_blank" data-placement="bottom"><i  class="fab fa-twitter fa-3x twt"></i></a></li>
                        @endif
                        @if($ayarlar->youtube)
                    <li><a href="{{$ayarlar->youtube}}" target="_blank" data-placement="bottom"><i class="fab fa-youtube fa-3x"></i></a></li>
                            @endif
                </ul>
            </div>

        </div>

    </div>

</div>
@endsection

@section('css')

    @endsection
@section('js')

    @endsection
