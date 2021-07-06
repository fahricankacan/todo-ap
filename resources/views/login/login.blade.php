@extends('layout.login')

@section('content')

    <div class="content d-flex justify-content-center align-items-center">

        <!-- Login form -->
        <form class="login-form" action="{{ route('auth.check') }}" method="post">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i
                            class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Giriş Yap</h5>
                        <span class="d-block text-muted">Giriş bilgilerini giriniz</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" class="form-control" placeholder="Kullanıcı adı" name="kullanici_adi">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                        @error('kullanici_adi') <span class="form-text text-danger"><i
                                    class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" class="form-control" placeholder="Şifre" name="sifre">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                        @error('sifre') <span class="form-text text-danger"><i
                                    class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Giriş Yap <i
                                class="icon-circle-right2 ml-2"></i></button>
                    </div>


                </div>
            </div>
        </form>
        <!-- /login form -->

    </div>
    
    <div class="content d-flex justify-content-center align-items-center">
        <a href="{{ route('auth.register') }}">Kayıt olmak için tıklayın.</a>
    </div>
    <div class="content d-flex justify-content-center align-items-center">
    @if(!empty(Session::get('fail')))
        
  
     <div class="alert alert-danger ">
         {{ Session::get('fail') }}
     </div>
     @endif
    </div>
    

@endsection
