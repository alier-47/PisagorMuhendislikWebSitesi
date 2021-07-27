@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Ürün Düzenle</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                @php
                                    $sira = 1;
                                @endphp
                                @foreach($images as $resim)
                                    <div class="col-md-55" id="resim{{$sira}}">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img style="width: 100%; display: block;" src="/uploads/img/urunler/{{$resim->resim_Yol}}" alt="{{$resim->resim_alt}}" />
                                                <div class="mask">
                                                    <div class="tools tools-bottom">
                                                        <input type="hidden" name="resim" value="{{$resim->resim_Yol}}">
                                                        <button type="button" class="btn btn-danger" onclick="sil(this,'{{$urun->slug}}','{{$resim->resim_Yol}}','resim{{$sira}}')"><i class="fa fa-times"></i></button>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @php
                                        $sira++;
                                    @endphp
                                @endforeach
                            </div>
                            <form method="post" action="/admin/urunler/urun-duzenle/{{$urun->slug}}" id="form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Yeni Resim Ekle</label >
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" type="file" name="images[]" multiple>

                                    </div>
                                </div>
                                {{ Form::bsText('urun_adi','Ürün Adı *', $urun->urun_adi, ['required'=>'required']) }}
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Markası <span style="color: #717171;">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control" name="marka" required="required">
                                            <option value="{{\App\Urunler::getMarkaID($urun->marka)}}">{{\App\Urunler::getMarka($urun->marka)}}</option>
                                            @foreach($markalar as $marka)
                                                <option value="{{$marka->id}}">{{$marka->marka_adi}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{ Form::bsText('YogusmaTipi','Yoğuşma Tipi', $urun->YogusmaTipi) }}
                                {{ Form::bsText('maxVerim','Maksimum Verim', $urun->maxVerim) }}
                                {{ Form::bsText('Kapasite','Kapasite', $urun->Kapasite) }}
                                {{ Form::bsText('fiyat','Ürün Fiyatı',$urun->fiyat) }}
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Açıklama <span style="color: black;">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea maxlength="5000" rows="10" class="form-control col-md-7 col-xs-12 ckeditor" name="aciklama" id="aciklama">{!! $urun->aciklama !!}</textarea>
                                    </div>
                                </div>
                                {{ Form::bsText('keywords','Anahtar Kelimeler', $urun->keywords) }}
                                {{ Form::bsText('description','Anahtar Cümle', $urun->description) }}


                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success" id="btnEkle">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="/css/sweetalert2.min.css" rel="stylesheet">
    <style>.swal2-popup{font-size: 1.5rem;}</style>
    <!-- Datatables -->
    <link href="/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection

@section('js')

    <!-- Datatables -->
    <script src="/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/backend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>

    <script src="/backend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/backend/vendors/pdfmake/build/vfs_fonts.js"></script>



    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js "></script>
    <script src="/js/sweetalert2.min.js "></script>
    <script src="/js/ckeditor/ckeditor.js "></script>
    <script src="/js/ckeditor/config.js"></script>
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
                    for (instance in CKEDITOR.instances)CKEDITOR.instances[instance].updateElement();
                },
                success:function (response) {
                    if (response.durum == 'success') {
                        Swal.fire({
                            title: response.baslik,
                            text: response.icerik,
                            type: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#ff4b07',
                            confirmButtonText: 'Ürün Listesine Dön',
                            cancelButtonText: 'Kapat',
                            cancelButtonColor: '#00a275',

                        }).then(function (result) {
                            if (result.value) {
                                setTimeout ("window.location='/admin/urunler'");
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
    <script>
        function sil(r,slug,res,id) {
            var sira = id;
            swal.fire({
                title: 'Silmek İstediğinize Emin Misiniz?',
                text: 'Silinen Resim Geri Döndürülemez!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil!',
                cancelButtonText: 'İptal',
                cancelButtonColor: 'blue',

            }).then(function (result){
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
                    $.ajax
                    ({
                        type: "post",
                        url: '',
                        data: {
                            'slug': slug,
                            '_token': CSRF_TOKEN,
                            'resim' : res,
                        },
                        beforeSubmit: function () {

                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                                showConfirmButton: false,
                                text: 'Yükleniyor Lütfen Bekleyiniz!!!...',
                            })

                        },
                        success: function (response) {
                            $renk = '#d33';
                            $textColor = '#d33'
                            if (response.durum == 'success') {
                                $("#"+sira).remove();
                                $renk = '#1add56'
                                $textColor = '#1add56'
                            }
                            Swal.fire({
                                title :response.baslik,
                                text :response.icerik,
                                textColor : $textColor,
                                confirmButtonText:response.durum,
                                confirmButtonColor: $renk,
                            });

                        }
                    })
                }
            })
        }
    </script>
@endsection
