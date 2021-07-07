@extends('layout.index')

@section('content')

    <!-- Support tickets -->
    <div class="card" id="bilgi_Bank_cart_id">
        <div class="card-header header-elements-sm-inline">
            <h6 class="card-title">Bilgi tickets</h6>
            {{-- <div class="header-elements">
                <a class="text-default daterange-ranges font-weight-semibold cursor-pointer dropdown-toggle">
                    <i class="icon-calendar3 mr-2"></i>
                    <span></span>
                </a>
            </div> --}}
        </div>

        <div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap" id="bilgi_Bank_cart_body_id">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div id="tickets-status"></div>
                <div class="ml-3">
                    <h5 class="font-weight-semibold mb-0">{{ $all_ticket_count}}  <span
                            class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i>
                            (+2.9%)</span></h5>
                    <span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">{{ Carbon\Carbon::now() }}</span>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3 mb-md-0">
                <a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
                    <i class="icon-alarm-add"></i>
                </a>
                <div class="ml-3">
                    <h5 class="font-weight-semibold mb-0">{{ $total_tickets }}</h5>
                    <span class="text-muted">toplam tickets</span>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3 mb-md-0">
                <a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
                    <i class="icon-spinner11"></i>
                </a>
                <div class="ml-3">
                    <h5 class="font-weight-semibold mb-0">{{ $response_time }}</h5>
                    <span class="text-muted">cevap süresi</span>
                </div>
            </div>

            <div>
                <a href="#" class="btn bg-teal-400" id="yeni-bilgi-olustur-button"><i class="icon-plus3 mr-2"></i> Yeni
                    Bilgi</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-nowrap" id="bilgi_tablosu_tablo_id">
                <thead>
                    <tr>
                        <th style="width: 50px">Due</th>
                        <th style="width: 300px;">User</th>
                        <th>Description</th>
                        <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-active table-border-double">
                        <td colspan="3">Active tickets</td>
                        <td class="text-right">
                            <span class="badge bg-blue badge-pill"><?php if (!empty($bilgiler)) {
                                echo $bilgiler['active']->count();
                                } else {
                                echo 0;
                                } ?></span>
                        </td>
                    </tr>

                    @empty(!$bilgiler['active'])


                        @foreach ($bilgiler['active'] as $active)


                            <tr class="deneme-1 tr_yenile" id="{{ $active->id }}">
                                <td class="text-center">
                                    <h6 class="mb-0"><i class="icon-dash"></i></h6>
                                    {{-- <div class="font-size-sm text-muted line-height-1">hours</div> --}}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-teal-400 rounded-round btn-icon btn-sm">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" data-target="yenibilgiBankasiModal"
                                                class="text-default font-weight-semibold letter-icon-title">@empty(!$active->personel){{ $active->personel->ad }}
                                                @endempty</a>
                                            <div class="text-muted font-size-sm"><span
                                                    class="badge badge-mark border-blue mr-1"></span> Active</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="bilgi-bankasi-tr" id="{{ $active->id }}">
                                    <a href="#" class="text-default ">
                                        <div class="font-weight-semibold">[#{{ $active->id }}] <?php
                                            $slen = strlen($active->baslik);
                                            if ($slen > 75) {
                                            echo substr($active->baslik, 0, 75) . '...';
                                            } else {
                                            echo $active->baslik;
                                            }
                                            ?> </div>
                                        <span class="text-muted"><?php
                                            $slen = strlen($active->aciklama);
                                            if ($slen > 75) {
                                            echo substr($active->aciklama, 0, 75) . '...';
                                            } else {
                                            echo $active->aciklama;
                                            }
                                            ?> </span>
                                    </a>
                                </td>
                                <td class="text-center ">
                                    <div class="list-icons">
                                        <div class="list-icons-item dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">


                                                <a href="#" class="dropdown-item cozuldu" id="{{ $active->id }}"><i
                                                        class="icon-checkmark3 text-success"></i>
                                                    Resolve issue</a>
                                                <a href="#" class="dropdown-item kapatildi" id="{{ $active->id }}"><i
                                                        class="icon-cross2 text-danger"></i> Close
                                                    issue</a>
                                                <a href="#" class="dropdown-item delete" id="{{ $active->id }}"><i
                                                        class="icon-cross2 text-danger "></i> Delete </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    @endempty


                    <tr class="table-active table-border-double">
                        <td colspan="3">Resolved tickets</td>
                        <td class="text-right">
                            <span class="badge bg-success badge-pill"><?php if (!empty($bilgiler)) {
                                echo $bilgiler['resolved']->count();
                                } else {
                                echo 0;
                                } ?></span>
                        </td>
                    </tr>


                    @empty(!$bilgiler['resolved'])
                        @foreach ($bilgiler['resolved'] as $resolved)
                            <tr class="deneme-2 tr_yenile" id="{{ $resolved->id }}">
                                <td class="text-center">
                                    <h6 class="mb-0"><i class="icon-dash"></i></h6>
                                    {{-- <div class="font-size-sm text-muted line-height-1">hours</div> --}}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-teal-400 rounded-round btn-icon btn-sm">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="text-default font-weight-semibold letter-icon-title">@empty(!$resolved->personel){{ $resolved->personel->ad }}
                                                @endempty</a>
                                            <div class="text-muted font-size-sm"><span
                                                    class="badge badge-mark border-success mr-1"></span> Resolved</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="bilgi-bankasi-tr" id="{{ $resolved->id }}">
                                    <a href="#" class="text-default ">
                                        <div class="font-weight-semibold">[#{{ $resolved->id }}] <?php
                                            $slen = strlen($resolved->baslik);
                                            if ($slen > 75) {
                                            echo substr($resolved->baslik, 0, 75) . '...';
                                            } else {
                                            echo $resolved->baslik;
                                            }
                                            ?> </div>
                                        <span class="text-muted"><?php
                                            $slen = strlen($resolved->aciklama);
                                            if ($slen > 75) {
                                            echo substr($resolved->aciklama, 0, 75) . '...';
                                            } else {
                                            echo $resolved->aciklama;
                                            }
                                            ?> </span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="list-icons-item dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">


                                                <a href="#" class="dropdown-item cozuldu" id="{{ $resolved->id }}"><i
                                                        class="icon-checkmark3 text-success"></i>
                                                    Resolve issue</a>
                                                <a href="#" class="dropdown-item kapatildi" id="{{ $resolved->id }}"><i
                                                        class="icon-cross2 text-danger"></i> Close
                                                    issue</a>
                                                <a href="#" class="dropdown-item delete" id="{{ $resolved->id }}"><i
                                                        class="icon-cross2 text-danger "></i> Delete </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    @endempty

                    <tr class="table-active table-border-double">
                        <td colspan="3">Closed tickets</td>
                        <td class="text-right">
                            <span class="badge bg-danger badge-pill"><?php if (!empty($bilgiler)) {
                                echo $bilgiler['closed']->count();
                                } else {
                                echo 0;
                                } ?></span>
                        </td>
                    </tr>

                    @empty(!$bilgiler['closed'])
                        @foreach ($bilgiler['closed'] as $closed)
                            <tr class="deneme-3 tr_yenile" id="{{ $closed->id }}">
                                <td class="text-center">
                                    <h6 class="mb-0"><i class="icon-dash"></i></h6>
                                    {{-- <div class="font-size-sm text-muted line-height-1">hours</div> --}}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-teal-400 rounded-round btn-icon btn-sm">
                                                <span class="letter-icon"></span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="text-default font-weight-semibold letter-icon-title">@empty(!$closed->personel){{ $closed->personel->ad }}
                                                @endempty</a>
                                            <div class="text-muted font-size-sm"><span
                                                    class="badge badge-mark border-danger mr-1"></span> Closed</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="bilgi-bankasi-tr" id="{{ $closed->id }}">
                                    <a href="#" class="text-default ">
                                        <div class="font-weight-semibold">[#{{ $closed->id }}] <?php
                                            $slen = strlen($closed->baslik);
                                            if ($slen > 75) {
                                            echo substr($closed->baslik, 0, 75) . '...';
                                            } else {
                                            echo $closed->baslik;
                                            }
                                            ?> </div>
                                        <span class="text-muted"><?php
                                            $slen = strlen($closed->aciklama);
                                            if ($slen > 75) {
                                            echo substr($closed->aciklama, 0, 75) . '...';
                                            } else {
                                            echo $closed->aciklama;
                                            }
                                            ?> </span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="list-icons-item dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">


                                                <a href="#" class="dropdown-item cozuldu" id="{{ $closed->id }}"><i
                                                        class="icon-checkmark3 text-success"></i>
                                                    Resolve issue</a>
                                                <a href="#" class="dropdown-item"><i class="icon-cross2 text-danger kapatildi"
                                                        id="{{ $closed->id }}"></i> Close
                                                    issue</a>
                                                <a href="#" class="dropdown-item delete" id="{{ $closed->id }}"><i
                                                        class="icon-cross2 text-danger "></i> Delete </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
    <!-- /support tickets -->

    <!--/modal güncelle -->

    <div class="modal fade" id="bilgiBankasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bilgilendirme Kartı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="bilgi_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Başlık:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" placeholder="Başlık" id="yeni_bilgi_baslik"
                                            name="baslik">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Açıklama:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Açıklama ekle"
                                            name="acilama" id="yeni_bilgi_aciklama"></textarea>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Başlığı Sahibi:</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select2" data-fouc id="yeni_personel_sec"
                                            name="personel_sec">
                                            <option selected value="0">Persoel Seç</option>
                                            @empty(!$personeller)
                                                @foreach ($personeller as $personel)
                                                    <option value="{{ $personel->id }}">
                                                        {{ $personel->ad . ' ' . $personel->soyad }}</option>
                                                @endforeach
                                            @endempty
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Dosya Yükle:</label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-input-styled" data-fouc id="yeni_dosya_ekle"
                                            name="dosya_ekle">
                                        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size
                                            2Mb</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3"><span>Dosya Adı : </span></div>
                                    <div class="col-lg-9" id="d_indir_div"></div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Add Modal -->

    <div class="modal fade" id="yenibilgiBankasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="yeniexampleModalLabel">Bilgilendirme Kartı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="yeniBilgiform" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Başlık:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" placeholder="Başlık" id="bilgi_baslik"
                                            name="bilgi_basligi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Açıklama:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Açıklama ekle"
                                            id="bilgi_aciklama" name="bilg_aciklama"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Başlığı Sahibi:</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select2" name="selected_personel" data-fouc
                                            id="yeni_selected_person">
                                            <option selected>Persoel Seç</option>
                                            @empty(!$personeller)
                                                @foreach ($personeller as $personel)
                                                    <option value="{{ $personel->id }}">
                                                        {{ $personel->ad . ' ' . $personel->soyad }}</option>
                                                @endforeach
                                            @endempty
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Dosya Yükle:</label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-input-styled" id="dosya_ekle" name="dosya_ekle">
                                        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size
                                            2Mb</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /Add modal -->

    <script>
        //modal için indirme linki oluşturur
        var lastClickedBilgi;
        let div_dosya_linki = document.getElementById('d_indir_div');
        let dosya_linki = document.createElement("a");
        dosya_linki.className = "col-lg-3";
        div_dosya_linki.appendChild(dosya_linki);
        sa = ""
        //tıklanan bilgiye göre ,bilgi formunu doldurur
        $(document).ready(function() {
            $(document).on('click','.bilgi-bankasi-tr' ,function(e) {

                
                lastClickedBilgi = this.id;
                GetDosyaID(this.id)
                console.log();
                console.log(this.id)

                if (sa == "") {
                    // dosya_linki.href = "#"
                    dosya_linki.innerHTML = "Dosya yüklenmemiş."
                } else {
                    dosya_linki.href = window.location.origin + "/indir/" + sa;
                    dosya_linki.innerText = "Dosyayı indir";
                }

                $('#bilgiBankasiModal').modal('show');
                var a = document.getElementById(this.id + "")
                var baslik = a.childNodes[5].childNodes[1].childNodes[1].innerText;
                var aciklama = a.childNodes[5].childNodes[1].childNodes[3].innerText;

                $('#yeni_bilgi_baslik').val(baslik.substring(baslik.lastIndexOf("]") + 1, baslik.lenght))
                $('#yeni_bilgi_aciklama').val(aciklama)
                $('#yeni_personel_sec').val(this.id + "")
                console.log($('#yeni_personel_sec').val());
                document.getElementById('yeni_personel_sec').value = 2;

            })
        })

        $(document).ready(function() {
            $(document).on('click','.delete' ,function(e) {
                console.log(this.id)

                $.ajaxSetup({
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                Swal.fire({
                    title: 'Silmek istediğine emin misin?',
                    text: "Bunu geri alamazsın!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, sil!',
                    cancelButtonText: 'Hayır!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: window.location.origin + "/delete/" + this.id,
                            success: function(response) {
                                console.log(response)
                                Swal.fire(
                                    'Başarı ile silindi !',
                                    'Bir bilgi silindi !',
                                    'success')
                                    $("#bilgi_Bank_cart_body_id ").load(window.location.href +
                            "  #bilgi_Bank_cart_body_id ")
                            
                            $("#bilgi_tablosu_tablo_id ").load(window.location.href +
                            "  #bilgi_tablosu_tablo_id")
                            },
                            error: function(response) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Bir hata ile karşılaşıldı!',

                                })
                            }
                        })
                      
                    }
                })


            })
        })


        //yeni bilgi butonuna tıklandığında bilgi ekleme modalını açar
        $('#yeni-bilgi-olustur-button').on('click', function(e) {
            $('#yenibilgiBankasiModal').modal('show');

        })
        //yeni bilgi ekle 
        $(document).ready(function() {
            $('#yeniBilgiform').on('submit', function(e) {
                e.preventDefault();

                var formElement = document.getElementById('#yeniBilgiform');
                console.log("ben ajax post")
                $.ajaxSetup({
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // var fd = new FormData();
                // var files = $('#dosya_yolu')[0].files[0];
                // fd.append('file', files);

                // -------------------

                var form = $('#yeniBilgiform')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);

                $.ajax({
                    type: "POST",
                    url: "/bilgiadd/" + getProjectIdWithURL(),
                    data: formData,
                    //fd, //$('#yeniBilgiform').serialize(),
                    processData: false, //add this
                    contentType: false, //and this
                    success: function(response) {
                        console.log($('#updateFormm').serialize())
                        console.log(response)

                        Swal.fire(
                            'Bilgi Eklendi!',
                            'Yeni bir bilgi eklendi!',
                            'success');

                        $('#yenibilgiBankasiModal').modal('hide');
                        $("#bilgi_tablosu_tablo_id ").load(window.location.href +
                            "  #bilgi_tablosu_tablo_id")
                            // window.location.reload();
                        // $("#card-body").load(window.location.href + "#card-body" )

                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Bir hata ile karşılaşıldı!',

                        })
                    }
                })
            })
        })

        //Bilgi güncelle 
        $(document).ready(function() {
            $('#bilgi_form').on('submit', function(e) {
                e.preventDefault();

                let formElement = document.getElementById('bilgi_form');
                $.ajaxSetup({
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: window.location.origin + "/bilgiupdate/" + lastClickedBilgi,
                    data: new FormData(formElement),
                    processData: false, //add this
                    contentType: false,
                    success: function(response) {
                        console.log(response)
                        $('#bilgiBankasiModal').modal('hide');
                        Swal.fire(
                            'Bilgi Güncellendi!',
                            'Sayfa yenilendiğinde değişiklikler gözükecektir!',
                            'success'
                        )
                        $("#bilgi_tablosu_tablo_id ").load(window.location.href +
                            "  #bilgi_tablosu_tablo_id")
                        
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Bir hata ile karşılaşıldı!',

                        })
                    }

                })
                console.log(this.id);
            })
        })



        $(document).ready(function() {
            $('.kapatildi').on('click', function(e) {
                // e.preventDefault();

                console.log("ben ajax post")
                $.ajaxSetup({
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    type: "PATCH",
                    url: "/bilgibankasi/" + this.id,
                    data: {
                        durum: 3
                    },
                    success: function(response) {
                        console.log(response)

                        Swal.fire(
                            'Bilgi Taşındı!',
                            'Bilgi kapanan konulara taşındı!',
                            'success'
                        )
                        $("#bilgi_tablosu_tablo_id ").load(window.location.href +
                            "  #bilgi_tablosu_tablo_id")

                    },
                    error: function(error) {
                        console.log(error)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Bir şeyler yanlış gitti!',

                        })
                    }
                })
            })
        })

        $(document).ready(function() {
            $('.cozuldu').on('click', function(e) {
                //e.preventDefault();

                console.log("ben ajax post")
                $.ajaxSetup({
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    type: "PATCH",
                    url: "/bilgibankasi/" + this.id,
                    data: {
                        durum: 2
                    },
                    success: function(response) {
                        console.log(response)
                        Swal.fire(
                            'Bilgi Taşındı!',
                            'Bilgi çözülen konulara taşındı!',
                            'success'
                        )

                        $("#bilgi_tablosu_tablo_id ").load(window.location.href +
                            "  #bilgi_tablosu_tablo_id")

                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Bir hata ile karşılaşıldı!',

                        })
                    }
                })
            })
        })


        function getProjectIdWithURL() {
            var url = window.location.href;
            var id = url.substring(url.lastIndexOf('/') + 1);
            return id;
        }
        /*
         *Bilgi id si alır geriye bilgi tablosunda dosya id sini döndürür
         */
        function GetDosyaID(id) {

            $.ajax({
                type: "get",
                url: window.location.origin + "/dosyaid/" + id,
                async: false,
                success: function(response) {
                    console.log("sa" + response);
                    sa = $.parseJSON(response);
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bir hata ile karşılaşıldı!',

                    })
                }
            })

        }
    </script>

    <script src="sweetalert2.all.min.js"></script>
@endsection
