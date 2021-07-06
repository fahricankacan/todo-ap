@extends('layout.login')

@section('content')


    <div class="content d-flex justify-content-center align-items-center">

        <!-- Registration form -->
        <form class="login-form" method="post" action="{{ route('auth.save') }}">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Hesap oluştur</h5>
                        <span class="d-block text-muted">Boş alan bırakmayınız.</span>

                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Kayıt Bilgileri</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" class="form-control" placeholder="Kullanıcı Adi" name="kullanici_adi"
                            value="{{ old('kullanici_adi') }}">
                        <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                        </div>

                        @error('kullanici_adi')
                            <span class="form-text text-danger"><i
                                    class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" class="form-control" placeholder="Şifre" name="sifre">
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>

                        @error('sifre')
                            <span class="form-text text-danger"><i
                                    class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Mail Adresi</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="email" class="form-control" placeholder="Mail Adresin" name="email"
                            value="{{ old('email') }}">
                        <div class="form-control-feedback">
                            <i class="icon-mention text-muted"></i>
                        </div>

                        @error('email') <span class="form-text text-danger"><i
                                    class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                        @enderror
                    </div>



                </div>

                <button type="submit" class="btn bg-teal-400 btn-block">Kayıt ol <i
                        class="icon-circle-right2 ml-2"></i></button>
            </div>
        </form>
        
    </div>
        <div class="content d-flex justify-content-center align-items-center">
            <a href="{{ route('auth.login') }}">Bir hesabım var.</a>
        </div>
    <div>

    </div>
    <div class="content d-flex justify-content-center align-items-center">

   
    @if (Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }}
        </div>

    @endif

    @if (Session::get('error'))
        <div class="alert alert-danger"> {{ Session::get('error') }}
        </div>

    @endif
</div>

@endsection
