@extends('layout.index')

@section('content')
    @csrf

    <form action="/proje/{{ $proje->id }}" method="post">
        @csrf
        <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold">Proje Oluştur</legend>


            <div class="form-group row">
                <label class="col-form-label col-lg-2">Müşteri Adı</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="proje_adi" value={{ $proje->ad . " " . $proje->soyad }} }}///////>
                </div>
            </div>
           
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Proje Adı</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="proje_adi" value={{ $proje->proje_adi }} }}>
                </div>
            </div>



            <div class="form-group row">
                <label class="col-form-label col-lg-2">Proje Açıklaması</label>
                <div class="col-lg-10">
                    <textarea rows="3" cols="3" class="form-control" placeholder="Proje Açıklaması"
                        name="proje_aciklamasi">{{ $proje->proje_aciklamasi }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-lg-2">Tarihler</label>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Alım Tarihi</label>
                                <input class="form-control form-control-lg" type="date" placeholder="Başlangıç Tarihi"
                                    name="baslangic_tarihi" value="{{ $proje->alim_tarihi }}">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Teslim Tarihi</label>
                                <input class="form-control form-control-lg" type="date" placeholder="Teslim Tarihi"
                                    name="bitis_tarihi" value="{{ $proje->teslim_tarihi }}">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            

            <div>
                <div class="row justify-content-end">
                    <!-- <div class=" p-1">
                                <a href="#" class="btn btn-primary">Sözleşme Oluştur <i class="icon-paperplane ml-2"></i></a>
                            </div>
                        -->

                    <div class=" p-1">
                        <button type="submit" class="btn btn-primary">Güncelle <i class="icon-paperplane ml-2"></i></button>
                    </div>

                </div>

            </div>

        </fieldset>
    </form>
     <!-- Switchery toggles -->

     <div class="form-check form-check-switchery form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input-switchery" checked data-fouc>
            First input
        </label>
    </div>
    

      
@endsection


