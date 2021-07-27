@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3> </h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">


                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#referans_listesi" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Referans Listesi</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#referans_ekle" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Referans Ekle</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <!----------  Referanslar  ------------>
                                    <div role="tabpanel" class="tab-pane fade active in" id="referans_listesi" aria-labelledby="home-tab">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">

                                                <div class="x_content">

                                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th width="20%">Ekleme Tarihi</th>
                                                            <th width="40%">Bina Adı</th>
                                                            <th width="20%">Yer</th>
                                                            <th>Sil</th>
                                                            <th>Düzenle</th>
                                                        </tr>
                                                        </thead>


                                                        <tbody>
                                                        @php
                                                            $sira = 1;
                                                        @endphp
                                                        @foreach($binalar as $bina)
                                                            <tr>

                                                                <td>{{$bina->created_at->addHours(3)->format('d/m/Y H:i')}}</td>
                                                                <td>{{$bina->bina_adi}}</td>
                                                                <td>{{$bina->yer}}</td>
                                                                <td>

                                                                    <input type="hidden" name="slug" value="{{$bina->slug}}">
                                                                    <input type="button"  onclick="sil(this,'{{$bina->slug}}')" class="btn btn-danger" value="Sil">

                                                                </td>
                                                                <td>
                                                                    <a href="/admin/referanslar/referans-duzenle/{{$bina->slug}}" class="btn btn-primary text-center" style="width: 100%">Düzenle</a>
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $sira++;
                                                            @endphp
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="referans_ekle" aria-labelledby="profile-tab">
                                        <form method="post" action="/admin/referanslar/referans-ekle" id="form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Resimler <span style="color: black;">*</span></label >
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input class="form-control col-md-7 col-xs-12" type="file" name="resimler[]" required multiple>

                                                </div>
                                            </div>
                                            {{ Form::bsText('bina_adi','Bina Adı *', '' ,['required'=>'required'])}}
                                            {{ Form::bsText('yer','Adres' ) }}
                                            {{ Form::bsText('yapilan_isler','Yapılan işler','',['placeholder'=>'her bir iş arasına virgül(,) koyunuz. Ör: doğalgaz tesisatı , PPRC hattı çekimi.']) }}
                                            {{ Form::bsText('resim_alt','Resim Açıklama') }}
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit" class="btn btn-success" id="btnEkle">Kaydet</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!----------  /Referanslar  ----------->

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

    <script>
        $(document).ready(function() {
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "copy",
                                className: "btn-sm"
                            },
                            {
                                extend: "csv",
                                className: "btn-sm"
                            },
                            {
                                extend: "excel",
                                className: "btn-sm"
                            },
                            {
                                extend: "pdfHtml5",
                                className: "btn-sm"
                            },
                            {
                                extend: "print",
                                className: "btn-sm"
                            },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            $('#datatable').dataTable();

            $('#datatable-keytable').DataTable({
                keys: true
            });

            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });

            $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });

            var $datatable = $('#datatable-checkbox');

            $datatable.dataTable({
                'order': [[ 1, 'asc' ]],
                'columnDefs': [
                    { orderable: false, targets: [0] }
                ]
            });
            $datatable.on('draw.dt', function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green'
                });
            });

            TableManageButtons.init();
        });
    </script>

    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js "></script>
    <script src="/js/sweetalert2.min.js "></script>
    <script src="/js/ckeditor/ckeditor.js "></script>
    <script src="/js/ckeditor/config.js"></script>

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
                success: function (response) {
                    if (response.durum == 'success') {
                        document.getElementById("form").reset();
                    }
                    Swal.fire(
                        response.baslik,
                        response.icerik,
                        response.durum
                    );
                }
            });
        });
    </script>

    <!-- Silme İşlemi -->
    <script>
        function sil(r,slug) {
            var sira = r.parentNode.parentNode.rowIndex;
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
                        },
                        beforeSubmit: function () {

                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                                showConfirmButton: false,
                                text: 'Yükleniyor...',
                            })

                        },
                        success: function (response) {
                            if (response.durum == 'success') {
                                document.getElementById("datatable-buttons").deleteRow(sira);
                            }
                            Swal.fire(
                                response.baslik,
                                response.icerik,
                                response.durum
                            );
                        }
                    })
                }
            })
        }
    </script>

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
