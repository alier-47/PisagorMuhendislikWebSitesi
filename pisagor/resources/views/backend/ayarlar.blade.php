@extends('backend.app')
@section('icerik')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>General Elements</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link right"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form method="post" id="form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                {{csrf_field()}}
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#genel_ayarlar" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Genel Ayarlar</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#iletisim_ayarlari" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">İletişim Ayarları</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#sosyal_medya" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Sosyal Medya</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#google_api" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Google API</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#mail_ayarlari" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Mail Ayarları</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="genel_ayarlar" aria-labelledby="home-tab">

                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mevcut Logo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <img src="/uploads/img/{{$ayarlar->logo}}" alt="Logo">
                                                 </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Site Logo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="file" name="logo">
                                                <input type="hidden" name="eski_logo" value="{{$ayarlar->logo}}">
                                            </div>
                                        </div>

                                        {{ Form::bsText('title','Site Başlığı', $ayarlar->title) }}
                                        {{ Form::bsText('keywords','Site Anahtar Kelime', $ayarlar->keywords) }}
                                        {{ Form::bsText('description','Site Açıklaması', $ayarlar->description) }}
                                        {{ Form::bsText('url','Site Adresi', $ayarlar-> url) }}
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="iletisim_ayarlari" aria-labelledby="profile-tab">

                                        {{ Form::bsText('tel','Telefon', $ayarlar->tel) }}
                                        {{ Form::bsText('tel2','2. Telefon', $ayarlar->tel2) }}
                                        {{ Form::bsText('faks','Faks', $ayarlar->faks) }}
                                        {{ Form::bsText('mail','E-Posta', $ayarlar->mail) }}
                                        {{ Form::bsText('adres','Adres', $ayarlar->adres) }}
                                        {{ Form::bsText('il','İl', $ayarlar->il) }}
                                        {{ Form::bsText('ilce','İlçe', $ayarlar->ilce) }}
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="sosyal_medya" aria-labelledby="profile-tab">

                                        {{ Form::bsText('facebook','Facebook', $ayarlar->facebook) }}
                                        {{ Form::bsText('twitter','Twitter', $ayarlar->twitter) }}
                                        {{ Form::bsText('instagram','Instagram', $ayarlar->instagram) }}
                                        {{ Form::bsText('youtube','Youtube', $ayarlar->youtube) }}

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="google_api" aria-labelledby="profile-tab">
                                        {{ Form::bsText('google','Google Hesabı', $ayarlar->google) }}
                                        {{ Form::bsText('recapctha','Google Recapctha', $ayarlar->recapctha) }}
                                        {{ Form::bsText('maps','Google Maps', $ayarlar->maps) }}
                                        {{ Form::bsText('analystic','Google Analystic', $ayarlar->analystic) }}
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="mail_ayarlari" aria-labelledby="profile-tab">
                                        {{ Form::bsText('smtp_user','Kullanıcı Adı', $ayarlar->smtp_user) }}
                                        {{ Form::bsText('smtp_password','Şifre', $ayarlar->smtp_password) }}
                                        {{ Form::bsText('smtp_host','SMTP Host', $ayarlar->smtp_host) }}
                                        {{ Form::bsText('smtp_port','SMTP Port', $ayarlar->smtp_port) }}
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Kaydet</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>


    <!-- /page content -->

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
                            )
                        }
                    });
                });
            </script>
    @endsection
