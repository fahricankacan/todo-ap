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

        <table class="table table-lg invoice-archive">
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
                                <a href="#" id="{{ $proje->id }}" class="list-icons-item secenekler" data-toggle="modal"
                                    data-target="#proje_sozlesme_modal"><i class="icon-file-eye"></i></a>
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

    <!--Proje Sözleşme Modal -->
    <div class="modal fade" id="proje_sozlesme_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proje_sozlesme_modal">Bilgilendirme Kartı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="yeniBilgiform" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">Editable invoice</h6>
                            <div class="header-elements">
                                <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i>
                                    Save</button>
                                <button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i>
                                    Print</button>
                            </div>
                        </div>

                        <div>
                            <div contenteditable="true">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <img src="../../../../global_assets/images/logo_demo.png" class="mb-3 mt-2"
                                                    alt="" style="width: 120px;">
                                                <ul class="list list-unstyled mb-0">
                                                    <li>2269 Elba Lane</li>
                                                    <li>Paris, France</li>
                                                    <li>888-555-2311</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <div class="text-sm-right">
                                                    <h4 class="text-primary mb-2 mt-md-2">Invoice #49029</h4>
                                                    <ul class="list list-unstyled mb-0">
                                                        <li>Date: <span class="font-weight-semibold">January 12, 2015</span>
                                                        </li>
                                                        <li>Due date: <span class="font-weight-semibold">May 12, 2015</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-md-flex flex-md-wrap">
                                        <div class="mb-4 mb-md-2">
                                            <span class="text-muted">Invoice To:</span>
                                            <ul class="list list-unstyled mb-0">
                                                <li>
                                                    <h5 class="my-2">Rebecca Manes</h5>
                                                </li>
                                                <li><span class="font-weight-semibold">Normand axis LTD</span></li>
                                                <li>3 Goodman Street</li>
                                                <li>London E1 8BF</li>
                                                <li>United Kingdom</li>
                                                <li>888-555-2311</li>
                                                <li><a href="#">rebecca@normandaxis.ltd</a></li>
                                            </ul>
                                        </div>

                                        <div class="mb-2 ml-auto">
                                            <span class="text-muted">Payment Details:</span>
                                            <div class="d-flex flex-wrap wmin-md-400">
                                                <ul class="list list-unstyled mb-0">
                                                    <li>
                                                        <h5 class="my-2">Total Due:</h5>
                                                    </li>
                                                    <li>Bank name:</li>
                                                    <li>Country:</li>
                                                    <li>City:</li>
                                                    <li>Address:</li>
                                                    <li>IBAN:</li>
                                                    <li>SWIFT code:</li>
                                                </ul>

                                                <ul class="list list-unstyled text-right mb-0 ml-auto">
                                                    <li>
                                                        <h5 class="font-weight-semibold my-2">$8,750</h5>
                                                    </li>
                                                    <li><span class="font-weight-semibold">Profit Bank Europe</span></li>
                                                    <li>United Kingdom</li>
                                                    <li>London E1 8BF</li>
                                                    <li>3 Goodman Street</li>
                                                    <li><span class="font-weight-semibold">KFH37784028476740</span></li>
                                                    <li><span class="font-weight-semibold">BPT4E</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Rate</th>
                                                <th>Hours</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0">Create UI design model</h6>
                                                    <span class="text-muted">One morning, when Gregor Samsa woke from
                                                        troubled.</span>
                                                </td>
                                                <td>$70</td>
                                                <td>57</td>
                                                <td><span class="font-weight-semibold">$3,990</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0">Support tickets list doesn't support commas</h6>
                                                    <span class="text-muted">I'd have gone up to the boss and told him just
                                                        what i think.</span>
                                                </td>
                                                <td>$70</td>
                                                <td>12</td>
                                                <td><span class="font-weight-semibold">$840</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0">Fix website issues on mobile</h6>
                                                    <span class="text-muted">I am so happy, my dear friend, so absorbed in
                                                        the exquisite.</span>
                                                </td>
                                                <td>$70</td>
                                                <td>31</td>
                                                <td><span class="font-weight-semibold">$2,170</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body">
                                    <div class="d-md-flex flex-md-wrap">
                                        <div class="pt-2 mb-3">
                                            <h6 class="mb-3">Authorized person</h6>
                                            <div class="mb-3">
                                                <img src="../../../../global_assets/images/signature.png" width="150"
                                                    alt="">
                                            </div>

                                            <ul class="list-unstyled text-muted">
                                                <li>Eugene Kopyov</li>
                                                <li>2269 Elba Lane</li>
                                                <li>Paris, France</li>
                                                <li>888-555-2311</li>
                                            </ul>
                                        </div>

                                        <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                                            <h6 class="mb-3">Total due</h6>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Subtotal:</th>
                                                            <td class="text-right">$7,000</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tax: <span class="font-weight-normal">(25%)</span></th>
                                                            <td class="text-right">$1,750</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td class="text-right text-primary">
                                                                <h5 class="font-weight-semibold">$8,750</h5>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="text-right mt-3">
                                                <button type="button"
                                                    class="btn btn-primary btn-labeled btn-labeled-left"><b><i
                                                            class="icon-paperplane"></i></b> Send invoice</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <span class="text-muted">Thank you for using Limitless. This invoice can be paid via
                                        PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the
                                        date of delivery. Late payment is possible, but with with a fee of 10% per month.
                                        Company registered in England and Wales #6893003, registered office: 3 Goodman
                                        Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311</span>
                                </div>
                            </div>
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
                    jsonDate= new Date(ajaxData["teslim_tarihi"])
                    $('#edit_proje_adi').val(ajaxData["proje_adi"]);
                    $('#edit_musteri_adi').val(ajaxData["musteri_id"]);
                    $('#edit_proje_teslim_tarihi').val(jsonDate.toISOString().split('T')[0]);
                    $('#edit_proje_aciklamasi').val(ajaxData["proje_aciklamasi"]);
                },
                error: function(response) {
                    console.log(response)
                }
            })

            var today = new Date().toISOString().split('T')[0];



        }
    </script>

@endsection
