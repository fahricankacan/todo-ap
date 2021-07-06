@extends('layout.index')

@section('content')


    <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title">Projeler</h6>
            <div class="header-elements">
                {{-- <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div> --}}
            </div>
        </div>

        <table class="table table-lg invoice-archive ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Proje Adı</th>
                    <th>Müşteri</th>
                    <th>Statü</th>
                    <th>Sözleşme Tarihi</th>
                    <th>Teslim Tarihi</th>
                    <th>Fiyat</th>
                    <th class="text-center">Seçenekler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projeler as $proje)


                    <tr id="{{ $proje->id }}">
                        <td>#{{ $proje->id }}</td>
                        <td>{{ $proje->proje_adi }}</td>
                        <td>
                            <h6 class="mb-0">
                                @empty(!$proje->musteri)
                                    <a href="#">
                                        {{ $proje->musteri->ad . ' ' . $proje->musteri->soyad }}

                                    </a>
                                    <span class="d-block font-size-sm text-muted">Telefon no:
                                        {{ $proje->musteri->tel_no }}</span>
                                @endempty
                            </h6>
                        </td>
                        <td>
                            <select name="status" class="form-control form-control-select2"
                                data-placeholder="Select status">
                                <option value="overdue">Yapım Aşamasında</option>
                                <option value="hold" selected>Beklemede</option>
                                <option value="pending">Bitti</option>
                                <option value="paid">Ödemenmiş</option>
                                {{-- <option value="invalid">Invalid</option> --}}
                                <option value="cancel">İptal Edilmiş</option>
                            </select>
                        </td>
                        <td>
                            {{ $proje->alim_tarihi }} {{-- April 18, 2015 --}}
                        </td>
                        <td>
                            <span class="badge badge-success">{{ $proje->teslim_tarihi }}</span>
                        </td>
                        <td>
                            <h6 class="mb-0 font-weight-bold">₺17,890
                                {{-- @if (!empty($proje->sozlesme))
                        {{ ₺$proje->sozlesme->proje_fiyat }}
                    @else
                        {{ "-" }}
                    @endif($proje->sozlesmes) --}}

                                <!--<span class="d-block font-size-sm text-muted font-weight-normal">VAT $4,890</span>-->
                            </h6>
                        </td>
                        <td class="text-center secenekler" id="{{ $proje->id }}">
                            <div class="list-icons list-icons-extended">
                                <a href="#" id="{{ $proje->id }}" class="list-icons-item secenekler incele"
                                    data-toggle="modal" data-target="#proje_incele_modal"><i
                                        class="icon-file-eye  "></i></a>
                                <div class="list-icons-item dropdown">
                                    <a href="#" id="{{ $proje->id }}" class="list-icons-item dropdown-toggle secenekler"
                                        data-toggle="dropdown"><i class="icon-file-text2"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a> --}}
                                        {{-- <a href="#" class="dropdown-item"><i class="icon-printer"></i> Düzenle</a>
                                <div class="dropdown-divider"></div> --}}
                                        <a href="#" class="dropdown-item" id="duzenle_dropdown"><i
                                                class="icon-file-plus"></i> Düzenle</a>
                                        <a href="#" class="dropdown-item" id="sil_dropdown"><i class="icon-cross2"></i>
                                            Sil</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>




    </div>
    <!--Proje Edit Modal -->
    <div class="modal fade" id="proje_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proje_edit_modal">Bilgilendirme Kartı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="proje_edit_modal_form" method="PUT" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        {{-- <div class="card-header header-elements-inline">
                       <h5 class="card-title">Basic layout</h5>
                       <div class="header-elements">
                           <div class="list-icons">
                               <a class="list-icons-item" data-action="collapse"></a>
                               <a class="list-icons-item" data-action="reload"></a>
                               <a class="list-icons-item" data-action="remove"></a>
                           </div>
                       </div>
                   </div> --}}

                        <div class="card-body">
                            <form action="#">
                                <div class="form-group">
                                    <label>Proje Adı:</label>
                                    <input type="text" class="form-control" placeholder="Proje Adı" name="edit_proje_adi"
                                        id="edit_proje_adi">
                                </div>


                                <div class="form-group">
                                    <label>Müşteri:</label>
                                    <select class="form-control" name="edit_musteri_adi" id="edit_musteri_adi">
                                        <option value="default">Müşteri Seç</option>
                                        @foreach ($musteriler as $musteri)
                                            <option value="{{ $musteri->id }}">
                                                {{ $musteri->ad . ' ' . $musteri->soyad }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Teslim Tarihi:</label>
                                    <input type="date" class="form-control" placeholder="Proje açıklaması"
                                        name="edit_proje_teslim_tarihi" id="edit_proje_teslim_tarihi"></input>
                                </div>

                                <div class="form-group">
                                    <label>Proje Açıklaması:</label>
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Proje açıklaması"
                                        name="edit_proje_aciklamasi" id="edit_proje_aciklamasi"></textarea>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Güncelle <i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Proje İncele Modal -->
    <div class="modal fade" id="proje_incele_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proje_edit_modal">Bilgilendirme Kartı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="proje_edit_modal_form" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                    
                        <div class="card-body">
                            <form action="#">
                                <div class="form-group">
                                    <label>Proje Adı:</label>
                                    <input type="text" class="form-control" placeholder="Proje Adı" name="incele_proje_adi"
                                        id="incele_proje_adi" disabled>
                                </div>


                                <div class="form-group">
                                    <label>Müşteri:</label>
                                    <select class="form-control" name="incele_musteri_adi" id="incele_musteri_adi" disabled>
                                        <option value="default">Müşteri Seç</option>
                                        @foreach ($musteriler as $musteri)
                                            <option value="{{ $musteri->id }}">
                                                {{ $musteri->ad . ' ' . $musteri->soyad }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Teslim Tarihi:</label>
                                    <input type="date" class="form-control" placeholder="Proje açıklaması"
                                        name="incele_proje_teslim_tarihi" id="incele_proje_teslim_tarihi" disabled></input>
                                </div>

                                <div class="form-group">
                                    <label>Proje Açıklaması:</label>
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Proje açıklaması"
                                        name="incele_proje_aciklamasi" id="incele_proje_aciklamasi" disabled></textarea>
                                </div>

                              
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var lastClickedItemID;
        //son tıklanan seçenekler tdsinin idsini verir.bu id projenin id si ile aynıdır.
        $(document).ready(function() {
            $('.secenekler').on('click', function(e) {
                e.preventDefault();
                lastClickedItemID = this.id;
                console.log("seçenek id : " + lastClickedItemID);

            })
        })

        //düzenlemek için modal açar 
        $('#duzenle_dropdown').on('click', async function(e) {

            await EditModalDoldur(lastClickedItemID);

            $('#proje_edit_modal').modal('show')
        })

        //incelemek için modal açar

        $('.incele').on('click', async function(e) {
            await InceleModalDoldur(this.id);
            $('#proje_incele_modal').modal('show');
        })


        $(document).ready(function() {
            $('#proje_edit_modal_form').on('submit', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var form = $('#proje_edit_moda_form')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);


                $.ajax({
                    type: "PUT",
                    url: window.location.origin + "/proje/" + 1,
                    data: $('#proje_edit_modal_form').serialize(),
                    success: function(response) {
                        console.log(response)
                        Swal.fire(
                            'Başarı ile güncellendi !',
                            'Bir bilgi güncellendi !',
                            'success')

                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Bir hata ile karşılaşıldı!',

                        })
                    }
                })

            })
        })

        function EditModalDoldur(id) {

            let ajaxData;
            $.ajax({
                type: "GET",
                url: window.location.origin + "/proje/" + id,
                async: false,
                success: function(response) {
                    console.log(response);
                    ajaxData = JSON.parse(response);
                    jsonDate = new Date(ajaxData["teslim_tarihi"])
                    $('#edit_proje_adi').val(ajaxData["proje_adi"]);
                    $('#edit_musteri_adi').val(ajaxData["musteri_id"]);
                    $('#edit_proje_teslim_tarihi').val(jsonDate.toISOString().split('T')[0]);
                    $('#edit_proje_aciklamasi').val(ajaxData["proje_aciklamasi"]);
                    $('#')
                },
                error: function(response) {
                    console.log(response)
                }
            })

            var today = new Date().toISOString().split('T')[0];




        }

        function InceleModalDoldur(id) {

            let ajaxData;
            $.ajax({
                type: "GET",
                url: window.location.origin + "/proje/" + id,
                async: false,
                success: function(response) {
                    console.log(response);
                    ajaxData = JSON.parse(response);
                    jsonDate = new Date(ajaxData["teslim_tarihi"])
                    $('#incele_proje_adi').val(ajaxData["proje_adi"]);
                    $('#incele_musteri_adi').val(ajaxData["musteri_id"]);
                    $('#incele_proje_teslim_tarihi').val(jsonDate.toISOString().split('T')[0]);
                    $('#incele_proje_aciklamasi').val(ajaxData["proje_aciklamasi"]);
                },
                error: function(response) {
                    console.log(response)
                }
            })

            var today = new Date().toISOString().split('T')[0];




        }


        //Proje silme işlemi

        $(document).ready(function() {
            $('#sil_dropdown').on('click', function(event) {
                event.preventDefault();

                $.ajaxSetup({
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: window.location.origin + "/proje/" + lastClickedItemID,
                    success: function(response) {
                        console.log(response)
                        Swal.fire(
                            'Proje silindi !',
                            'Bir proje başarı ile silindi !',
                            'success')
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Bir hata ile karşılaşıldı!',

                        })
                    }
                })
            })

        })
    </script>

@endsection
