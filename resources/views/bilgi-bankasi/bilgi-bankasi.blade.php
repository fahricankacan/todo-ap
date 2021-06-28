@extends('layout.index')

@section('content')

    <!-- Support tickets -->
    <div class="card">
        <div class="card-header header-elements-sm-inline">
            <h6 class="card-title">Support tickets</h6>
            <div class="header-elements">
                <a class="text-default daterange-ranges font-weight-semibold cursor-pointer dropdown-toggle">
                    <i class="icon-calendar3 mr-2"></i>
                    <span></span>
                </a>
            </div>
        </div>

        <div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div id="tickets-status"></div>
                <div class="ml-3">
                    <h5 class="font-weight-semibold mb-0">14,327 <span
                            class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i>
                            (+2.9%)</span></h5>
                    <span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">Jun 16, 10:00
                        am</span>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3 mb-md-0">
                <a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
                    <i class="icon-alarm-add"></i>
                </a>
                <div class="ml-3">
                    <h5 class="font-weight-semibold mb-0">1,132</h5>
                    <span class="text-muted">total tickets</span>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3 mb-md-0">
                <a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
                    <i class="icon-spinner11"></i>
                </a>
                <div class="ml-3">
                    <h5 class="font-weight-semibold mb-0">06:25:00</h5>
                    <span class="text-muted">response time</span>
                </div>
            </div>

            <div>
                <a href="#" class="btn bg-teal-400" id="yeni-bilgi-olustur-button"><i class="icon-plus3 mr-2"></i> Yeni
                    Bilgi</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-nowrap">
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


                            <tr id="deneme-1">
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
                                                class="text-default font-weight-semibold letter-icon-title">@empty(!$active->personel){{ $active->personel->ad }}
                                                @endempty</a>
                                            <div class="text-muted font-size-sm"><span
                                                    class="badge badge-mark border-blue mr-1"></span> Active</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="text-default bilgi-bankasi-tr">
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
                            <tr id="deneme-2">
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
                                <td>
                                    <a href="#" class="text-default bilgi-bankasi-tr">
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
                            <tr id="deneme-3">
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
                                <td>
                                    <a href="#" class="text-default bilgi-bankasi-tr">
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

    <!--/modal -->

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
                <form>
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
                                        <input type="file" class="form-input-styled" data-fouc id="yeni_dosya_ekle"
                                            name="dosya_ekle">
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
                <form id="yeniBilgiform" method="GET" enctype="multipart/form-data">
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
                                        <select class="form-control form-control-select2" name="selected_personel"
                                            data-fouc>
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
                                        <input type="file" class="form-input-styled" id="dosya_yolu" name="dosya_yolu">
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
        $('.bilgi-bankasi-tr').on('click', function(event) {
            $('#bilgiBankasiModal').modal('show');

        })

        $('#yeni-bilgi-olustur-button').on('click', function(e) {
            $('#yenibilgiBankasiModal').modal('show');

        })
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
                    url: "/bilgibankasi",
                    data:formData,
                    //fd, //$('#yeniBilgiform').serialize(),
                    processData: false, //add this
                    contentType: false, //and this
                    success: function(response) {
                        console.log($('#updateFormm').serialize())
                        console.log(response)
                        $('#updateModal').modal('hide')
                        alert("data saved");
                        // $("#card-body").load(window.location.href + "#card-body" )

                    },
                    error: function(error) {
                        console.log(error)
                        alert("data not saved")
                    }
                })
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
                        alert("data sended");
                        // $("#card-body").load(window.location.href + "#card-body" )

                    },
                    error: function(error) {
                        console.log(error)
                        alert("data not sended")
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
                        alert("data sended");
                        //  $("#card-body").load(window.location.href + "#card-body" )

                    },
                    error: function(error) {
                        console.log(error)
                        alert("data not sended")
                    }
                })
            })
        })
    </script>
@endsection
