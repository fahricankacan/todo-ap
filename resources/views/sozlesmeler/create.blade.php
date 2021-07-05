@extends('layout.index')

@section('content')


<form action="/sozlesme" method="post">
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
                        <select class="form-control" name="proje_id">
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
                            name="sozlesme_metni"></textarea>
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
                                        placeholder="Başlangıç Tarihi" name="sozlesme_tarihi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Teslim Tarihi</label>
                                    <input class="form-control form-control-lg" type="date" placeholder="Teslim Tarihi"
                                        name="teslim_tarihi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Fiyat</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="proje_fiyat" placeholder="Proje fiyatı">
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <div class="row justify-content-end">
                        <div class=" p-1">
                            <button type="submit" class="btn btn-primary">Proje Oluştur <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</form>

@endsection