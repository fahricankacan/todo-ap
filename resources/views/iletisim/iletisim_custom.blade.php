@extends('layout.custom_mail')

@section('content')

<form action="/sendemail/custom" method="post">
    @csrf
    <div class="card">
        <div class="card-body">

            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Mail Oluştur</legend>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Mail Başlığı</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" name="mail_adresi[]" multiple="multiple">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Mail Başlığı</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="mail_adi">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Mail Açıklaması</label>
                    <div class="col-lg-10">
                        <textarea rows="3" cols="3" class="form-control" placeholder="MAİL Açıklaması"
                            name="mail_aciklamasi"></textarea>
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
                            <button type="submit" class="btn btn-primary">Mail Gönder <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</form>


@endsection