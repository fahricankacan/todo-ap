@extends('layout.index')

@section('content')


<div class="card-body">

    <form action="/musteri/{{ $musteri->id }}" method="post">
        @csrf
        @method('PUT')
        <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold">Müşteri Ekle</legend>

            <div class="form-group row">
                <label class="col-form-label col-lg-2">Adı</label>
                <div class="col-lg-10">
                    <input disabled type="text" class="form-control" name="adi" value="{{ $musteri->ad }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-lg-2">Soyad</label>
                <div class="col-lg-10">
                    <input disabled type="text" class="form-control" name="soyad" value="{{ $musteri->soyad }}">
                </div>
            </div>

            <div class="form-group row">
				<label class="col-form-label col-md-2">Telefon Numarası</label>
					<div class="col-md-10">
							<input disabled class="form-control" type="number" name="telefon_numarasi" value="{{ intval($musteri->tel_no)}}">

		    	</div>
	    	</div>

            <div class="form-group row">
                <label class="col-form-label col-md-2">Email</label>
                <div class="col-md-10">
                    <input disabled class="form-control" type="email" name="email" value="{{ $musteri->mail_adresi}}">

                </div>
            </div>


            <div class="form-group row">
                <label class="col-form-label col-lg-2">İl</label>
                <div class="col-lg-10">
                    <input disabled type="text" class="form-control" name="il" value="{{ $musteri->il}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-lg-2">İlçe</label>
                <div class="col-lg-10">
                    <input disabled type="text" class="form-control" name="ilce" value="{{ $musteri->ilce }}">
                </div>
            </div>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
            @endif

            <div class="text-right">
                    <button type="submit" class="btn btn-primary">Güncelle <i class="icon-paperplane ml-2"></i></button>
            </div>

        </fieldset>
    </form>
</div>

@endsection
