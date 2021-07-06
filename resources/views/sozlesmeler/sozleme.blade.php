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

        <table class="table table-lg invoice-archive" div="sozlesme_table">
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
                @foreach ($sozlesmeler as $sozlesme)

                    @if ($sozlesme->proje_id > 0)

                        <tr id="{{ $sozlesme->proje->id }}">
                            <td>#{{ $sozlesme->proje->id }}</td>
                            <td>{{ $sozlesme->proje->proje_adi }}</td>
                            <td>
                                <h6 class="mb-0">

                                    <a href="#">
                                        {{ $sozlesme->proje->musteri->ad . ' ' . $sozlesme->proje->musteri->soyad }}

                                    </a>
                                    <span class="d-block font-size-sm text-muted">Telefon no:
                                        {{ $sozlesme->proje->musteri->tel_no }}</span>

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
                                {{ $sozlesme->proje->alim_tarihi }} {{-- April 18, 2015 --}}
                            </td>
                            <td>
                                <span class="badge badge-success">{{ $sozlesme->proje->teslim_tarihi }}</span>
                            </td>
                            <td>
                                <h6 class="mb-0 font-weight-bold">₺{{ $sozlesme->proje_fiyat }}
                                    {{-- @if (!empty($proje->sozlesme))
                    {{ ₺$proje->sozlesme->proje_fiyat }}
                @else
                    {{ "-" }}
                @endif($proje->sozlesmes) --}}

                                    <!--<span class="d-block font-size-sm text-muted font-weight-normal">VAT $4,890</span>-->
                                </h6>
                            </td>
                            <td class="text-center secenekler" id="{{ $sozlesme->id }}">
                                <div class="list-icons list-icons-extended">
                                    <a href="#" id="{{ $sozlesme->id }}" class="list-icons-item secenekler incele"
                                        data-toggle="modal" data-target="#proje_incele_modal"><i
                                            class="icon-file-eye  "></i></a>
                                    <div class="list-icons-item dropdown">
                                        <a href="#" id="{{ $sozlesme->id }}"
                                            class="list-icons-item dropdown-toggle secenekler" data-toggle="dropdown"><i
                                                class="icon-file-text2"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            {{-- <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a> --}}
                                            {{-- <a href="#" class="dropdown-item"><i class="icon-printer"></i> Düzenle</a>
                            <div class="dropdown-divider"></div> --}}
                                            <a href="#" class="dropdown-item duzenle_sec" id="{{ $sozlesme->id }}"><i
                                                    class="icon-file-plus"></i> Düzenle</a>
                                            <a href="#" class="dropdown-item duzenle_sil" id="{{ $sozlesme->id }}"><i
                                                    class="icon-cross2"></i>
                                                Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>



    </div>

    <!--Düzenle modal -->
    <div class="modal fade" id="sozlesme_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proje_edit_modal">Bilgilendirme Kartı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="PUT" id="sozlesme_duzenle">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Sözleşme Oluştur</legend>

                                {{-- <div class="form-group row">
                                   <label class="col-form-label col-lg-2">Müşteri Seç</label>
                                   <div class="col-lg-10">
                                       <select class="form-control" name="musteri_id">
                                           <option value="default">Default select box</option>
                                           @foreach ($musteriler as $musteri)
                                               <option value="{{ $musteri->id }}">{{ $musteri->ad }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div> --}}
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Proje Seç</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="proje_id" id="edit_proje_id">
                                            <option value="default">Default select box</option>
                                            @foreach ($projeler as $proje)
                                                <option value="{{ $proje->id }}">{{ $proje->proje_adi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Sözleşme Metni</label>
                                    <div class="col-lg-10">
                                        <textarea rows="3" cols="3" class="form-control" placeholder="Sözleşme Metni Ekle"
                                            name="sozlesme_metni" id="edit_sozlesme_metni"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Tarihler</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Alım Tarihi</label>
                                                    <input class="form-control form-control-lg" type="date"
                                                        placeholder="Başlangıç Tarihi" name="sozlesme_tarihi"
                                                        id="edit_alim_tarihi">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Teslim Tarihi</label>
                                                    <input class="form-control form-control-lg" type="date"
                                                        placeholder="Teslim Tarihi" name="teslim_tarihi"
                                                        id="edit_teslim_tarihi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Fiyat</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="proje_fiyat"
                                            placeholder="Proje fiyatı" id="edit_proje_fiyat">
                                    </div>
                                </div>

                                {{-- @if ($errors->any())
                                   <div class="alert alert-danger" role="alert">
                                       <ul>
                                           @foreach ($errors->all() as $error)
                                               <li>{{ $error }}</li>
                                           @endforeach
                                       </ul>
                                   </div>
                               @endif --}}

                                <div>
                                    <div class="row justify-content-end">
                                        <div class=" p-1">
                                            <button type="submit" class="btn btn-primary">Düzenle <i
                                                    class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--İncele modal -->
    <div class="modal fade" id="sozlesme_inceleme_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proje_inceleme_modal_baslik">Sözleşme Metni</h5>

                </div>

                <div class="modal-body">

                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <h6 class="card-title" id="proje_baslik">Static invoice</h6>
                            <div class="header-elements">
                                {{-- <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save</button>
                                <button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> Print</button> --}}
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <img src="../../../../global_assets/images/logo_demo.png" class="mb-3 mt-2" alt=""
                                            style="width: 120px;">
                                        <ul class="list list-unstyled mb-0">
                                            <li>Akana Mühendislik</li>
                                            <li>Sincan, Ankara</li>
                                            <li>888-555-2311</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <div class="text-sm-right">
                                            <h4 class="text-primary mb-2 mt-md-2" id="proje_adi_ve_id">Proje No #49029</h4>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Sözleşme Tarihi: <span class="font-weight-semibold"
                                                        id="alim_tarihi">January 12,
                                                        2015</span></li>
                                                <li>Teslim Tarihi: <span class="font-weight-semibold" id="teslim_tarihi">May
                                                        12,
                                                        2015</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-md-flex flex-md-wrap">
                                <div class="mb-4 mb-md-2">
                                    <span class="text-muted">Müşteri:</span>
                                    <ul class="list list-unstyled mb-0">
                                        <li>
                                            <h5 class="my-2" id="musteri_Adi">Rebecca Manes</h5>
                                        </li>
                                        {{-- <li><span class="font-weight-semibold" id>Normand axis LTD</span></li> --}}
                                        {{-- <li id="">3 Goodman Street</li> --}}
                                        <li id="musteri_ilce">London E1 8BF</li>
                                        <li id="musteri_il">United Kingdom</li>
                                        <li id="musteri_tel">888-555-2311</li>
                                        <li id="mail_adresi"><a href="#">rebecca@normandaxis.ltd</a></li>
                                    </ul>
                                </div>

                                {{-- <div class="mb-2 ml-auto">
                                    <span class="text-muted">Payment Details:</span>
                                    <div class="d-flex flex-wrap wmin-md-400">
                                        <ul class="list list-unstyled mb-0">
                                            <li>
                                                <h5 class="my-2">Ödeme Tutarı:</h5>
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
                                                <h5 class="font-weight-semibold my-2" id>$8,750</h5>
                                            </li>
                                             <li><span class="font-weight-semibold">Profit Bank Europe</span></li>
                                            <li>United Kingdom</li>
                                            <li>London E1 8BF</li>
                                            <li>3 Goodman Street</li>
                                            <li><span class="font-weight-semibold">KFH37784028476740</span></li>
                                            <li><span class="font-weight-semibold">BPT4E</span></li> 
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>Açıklama</th>
                                        {{-- <th>Rate</th>
                                        <th>Hours</th>
                                        <th>Total</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">Sözleşme Metni</h6>
                                            <span class="text-muted" id="aciklama_metni">One morning, when Gregor Samsa woke
                                                from
                                                troubled.</span>
                                            {{-- </td>
                                        <td>$70</td>
                                        <td>57</td>
                                        <td><span class="font-weight-semibold">$3,990</span></td> --}}
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="card-body">
                            <div class="d-md-flex flex-md-wrap">
                                <div class="pt-2 mb-3">
                                    <h6 class="mb-3">Yetkili Kişi</h6>
                                    <div class="mb-3">
                                        <img src="../../../../global_assets/images/signature.png" width="150" alt="">
                                    </div>

                                    <ul class="list-unstyled text-muted">
                                        <li>Serdar Halit Satıoplu</li>
                                        <li>Etimesgut Ahimesut</li>
                                        <li>Ankara, Sincan</li>
                                        <li>888-555-2311</li>
                                    </ul>
                                </div>

                                <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                                    <h6 class="mb-3">Toplam Ücret</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                {{-- <tr>
                                                    <th>Subtotal:</th>
                                                    <td class="text-right">$7,000</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax: <span class="font-weight-normal">(25%)</span></th>
                                                    <td class="text-right">$1,750</td>
                                                </tr> --}}
                                                <tr>
                                                    <th>Ödenecek Tutar:</th>
                                                    <td class="text-right text-primary">
                                                        <h5 class="font-weight-semibold" id="proje_ucreti">$8,750</h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- <div class="text-right mt-3">
                                        <button type="button" class="btn btn-primary btn-labeled btn-labeled-left"><b><i
                                                    class="icon-paperplane"></i></b> Send invoice</button>
                                     </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <span class="text-muted">Taraflar işbu Sözleşmeyi imzalamakla doğrudan ya da dolaylı olarak
                                diğer Tarafın gizli
                                bilgilerini öğrenecek durumdaki tüm personeli, danışmanları, alt yüklenicileri, iş ortakları
                                ve olası diğer kişilerin gizli bilgiyi koruyacaklarını ve bu Sözleşme’nin şartlarına
                                uyacaklarını taahhüt etmektedir. Taraflar bu amacı sağlamaya yönelik olarak ilgili kişiler
                                ile yaptığı/yapacağı Sözleşmelerde Gizlilik Şartını koyacak veya ayrı bir Gizlilik
                                Sözleşmesi imzalayacaktır.</span>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i>
                        Yazdır</button>
                </div>

            </div>
        </div>
    </div>



    <script>
        var duzenleID;
        //sozlesme düzenle içerisi doldurulması
        $(document).ready(function() {
            $('.duzenle_sec').on('click', function(e) {
                e.preventDefault();
                duzenleID = this.id;
                SozlesmeDuzenleModalDoldur(this.id)
                $('#sozlesme_edit_modal').modal('toggle');

            })
        })


        //sozlesme düzenle submit edilirse
        $(document).ready(function() {
            $('#sozlesme_duzenle').on('submit', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: window.location.origin + "/sozlesme/" + duzenleID,
                    data:$('#sozlesme_duzenle').serialize(),
                    success: function(response) {
                        $('#sozlesme_edit_modal').modal('toggle');
                        Swal.fire(
                            'Başarılı !',
                            'Bir kayıt güncellendi !',
                            'success')
                            //$('#sozlesme_table').load('')
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

        //sozlesme sil
        $(document).ready(function() {
            $('.duzenle_sil').on('click', function(e) {
                e.preventDefault();
                SozlesmeSil(this.id)

            })
        })

        //sözleşme incele
        $(document).ready(function() {
            $('.incele').on('click', async function(e) {
                e.preventDefault();
                $('#sozlesme_inceleme_modal').modal('toggle');
                await SozlesmeIncele(this.id);
            })
        })


        function SozlesmeIncele(id) {
            console.log(id)

            $.ajax({
                type: "GET",
                url: window.location.origin + "/sozlesme/" + id,
                async: false,
                success: function(response) {
                    console.log(response)
                    ajaxData = JSON.parse(response);
                    alimTarihi = new Date(ajaxData["sozlesme_alim_tarihi"])
                    teslimTarihi = new Date(ajaxData["sozlesme_teslim_tarihi"])
                    document.getElementById('proje_baslik').innerText = ajaxData['proje_adi'];
                    document.getElementById('proje_adi_ve_id').innerText = "#Proje No:" + ajaxData['proje_id'];
                    document.getElementById('proje_ucreti').innerText = "₺" + ajaxData['proje_ucreti'];
                    document.getElementById('alim_tarihi').innerText = alimTarihi;
                    document.getElementById('teslim_tarihi').innerText = teslimTarihi;
                    document.getElementById('aciklama_metni').innerText = ajaxData['sozlesme_aciklama_metni'];
                    document.getElementById('musteri_Adi').innerText = ajaxData['musteri_adi'] + " " + ajaxData[
                        'musteri_soyad'];
                    document.getElementById('musteri_il').innerText = ajaxData['musteri_il']
                    document.getElementById('musteri_ilce').innerText = ajaxData['musteri_ilce']
                    document.getElementById('musteri_tel').innerText = ajaxData['musteri_tel']
                    document.getElementById('mail_adresi').innerText = ajaxData['musteri_mail_adresi']

                },
                error: function(response) {
                    console.log(response)
                }
            })
        }

        function SozlesmeSil(id) {

            $.ajaxSetup({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: window.location.origin + "/sozlesme/" + id,
                async: false,
                success: function(response) {
                    Swal.fire(
                        'Başarı ile silindi !',
                        'Bir kayıt silindi !',
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
        }

        function SozlesmeDuzenleModalDoldur(id) {

            $.ajax({
                type: "GET",
                url: window.location.origin + "/sozlesme/" + id + "/edit",
                async: false,
                success: function(response) {
                    console.log(response);

                    ajaxData = JSON.parse(response);
                    t_tarih = new Date(ajaxData["teslim_tarihi"])
                    a_tarihi = new Date(ajaxData["alim_tarihi"])
                    document.getElementById('edit_proje_id').value = ajaxData['proje_id']
                    document.getElementById('edit_sozlesme_metni').innerText = ajaxData['aciklama_metni']
                    document.getElementById('edit_alim_tarihi').valueAsDate = a_tarihi
                    document.getElementById('edit_teslim_tarihi').valueAsDate = t_tarih
                    document.getElementById('edit_proje_fiyat').value = ajaxData['proje_fiyat']
                },
                error: function(response) {
                    console.log(response)
                }
            })

            var today = new Date().toISOString().split('T')[0];

        }
    </script>
@endsection
