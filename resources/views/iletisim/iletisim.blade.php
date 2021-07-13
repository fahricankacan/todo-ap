@extends('layout.index')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1><i class=""></i> E-mail Seçenekleri</h1>
                <hr>
            </div>

            <div class="row mx-2">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Müşteri</h5>
                            <p class="card-text">Bir müşteriye mail gönder.</p>
                            <a href="{{ route('iletisim.musteri') }}" id="musteri_button_id" class="btn btn-primary">Mail gönder</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Çalışan</h5>
                            <p class="card-text">Tek bir çalışana mail gönder.</p>
                            <a href="{{ route('iletisim.personel') }}" id="calisan_button_id" class="btn btn-primary">Mail gönder</a>
                        </div>
                    </div>
                </div>
            </div>        
            <div class="row mx-2">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Custom</h5>
                            <p class="card-text">Herhangi bir kişiye mail gönder.</p>
                            <a href="{{ route('iletisim.custom') }}" id="custom_mail_id" class="btn btn-primary">Mail gönder</a>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </div>




    <script src="{{ URL::asset('assets/js/iletisim/iletisim_index.js') }}"></script>

@endsection
