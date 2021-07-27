@extends('backend.app')
@section('icerik')
    <style>
        #mesajDetayTitle{
            background-color: #02bd2a;
            padding: 8px;
            margin: -15px;
            text-align: center;
            color: white;
            font-weight: bold;
            font-size: 25px;
        }
        #mesajDetayBody{
            padding-top: 25px;
            text-align: center;
            font-size: 20px;
        }
        .nav-md .container.body .right_col{
            min-height: auto !important;
        }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="mesajDetay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="word-break: break-word;">
                <div class="modal-header">
                    <h5 class="modal-title" id="mesajDetayTitle">Açıklama</h5>
                    <div class="modal-body" id="mesajDetayBody">
                        <span id="gelenmesajDetay"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>

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
                                    <li role="presentation" class="active"><a href="#talep_listesi" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Mesaj Listesi</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <!----------  Mesajlar  ------------>
                                    <div role="tabpanel" class="tab-pane fade active in" id="mesaj_listesi" aria-labelledby="home-tab">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">

                                                <div class="x_content">

                                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Ekleme Tarihi</th>
                                                            <th>Ad Soyad</th>
                                                            <th>Telefon</th>
                                                            <th>E-posta</th>
                                                            <th>Detay</th>
                                                            <th>Sil</th>
                                                        </tr>
                                                        </thead>


                                                        <tbody>
                                                        @php
                                                            $sira = 1;

                                                        @endphp
                                                        @foreach($mesajlar as $mesaj)

                                                            <tr style="font-weight: bold;color: #000;">
                                                                <td>{{$mesaj->created_at->addHours(3)->format('d/m/Y H:i')}}</td>
                                                                <td>{{$mesaj->adsoyad}}</td>
                                                                <td>{{$mesaj->telefon}}</td>
                                                                <td>{{$mesaj->mail}}</td>
                                                                <td>
                                                                    @if($mesaj->mesaj != '')
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mesajDetay" onclick="detay('{{$mesaj->mesaj}}')">
                                                                            Açıklamayı Gör
                                                                        </button>
                                                                    @else
                                                                        <label style="background-color: #c5c5c5;color: white;font-weight: bold" class="btn">Not Yok</label>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" name="id" value="{{$mesaj->id}}">
                                                                    <input type="button"  onclick="mesajSil(this,'{{$mesaj->id}}')" class="btn btn-danger" value="Sil">

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
                                </div>
                            </div>


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


    <!-- Silme İşlemi -->
    <script>
        function mesajSil(r,id) {
            var sira = r.parentNode.parentNode.rowIndex;
            swal.fire({
                title: 'Silmek İstediğinize Emin Misiniz?',
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
                            'id': id,
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
    <script>
        function detay(mesaj) {
            var detay = mesaj;
            $('#gelenmesajDetay').html(detay);

        }

    </script>
@endsection
