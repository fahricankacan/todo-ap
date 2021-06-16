@extends('layout.index')

@section('content')


    <div class="card-body">

        <form action="/personel/{{ $personel->id }}" method="post">
            @csrf
            @method('PUT')
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Personel Ekle</legend>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Adı</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="ad" value="{{ $personel->ad }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Soyad</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="soyad" value="{{ $personel->soyad }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-2">Telefon Numarası</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="tel_no" value="{{ $personel->tel_no }}">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-2">Email</label>
                    <div class="col-md-10">
                        <input class="form-control" type="email" name="mail_adresi" value="{{ $personel->mail_adresi}}">

                    </div>
                </div>


                {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
            @endif --}}

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Güncelle <i class="icon-paperplane ml-2"></i></button>
                </div>

            </fieldset>
        </form>
    </div>

@endsection
