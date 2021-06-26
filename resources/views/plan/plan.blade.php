@extends('layout.index')


@section('content')



    <div class="card h-100 ">
        <div class="card-body">
            <!----------------LİSTLER-------------------------->
            <div class="row ">
                <div class="col-sm-4">
                    <div class=" text-center  ">
                        <h5> Yapılacaklar </h5>
                        <hr>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h1 class="text-center">Yapılıyor</h1>
                    <hr>
                </div>
                <div class="col-sm-4">
                    <h1 class="text-center">Bitti</h1>
                    <hr>
                </div>
            </div>
            <div class=row>
                <!--------------COLON 1 ------------------------->
                <div class="col-sm-4 ">
                    {{--  --}}

                    <div class="card-body ">


                        {{-- <h1 class="text-center">To-do</h1>
                            <hr> --}}
                        <ul class="list-group droptrue px-2 bg-light" id="sortable1">

                            @empty(!$bir)

                            <div class="kolon1">
                                @foreach ($bir as $card)

                                
                                    <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1 .selam"
                                        id="{{ $card->id }}">
                                        <div class="card-body">
                                            <p class="fs-3"><b>{{ $card->gorev_adi }} </b></p>
                                            <div class="d-flex w-100 justify-content-between">
                                                @empty(!$card->teslim_tarihi)
                                                    <?php $day =
                                                    Carbon\Carbon::parse($card->alim_tarihi)->diffInDays($card->teslim_tarihi); ?>
                                                    <span class="<?php if ($day > 0) {
                                                                    echo 'text-success';
                                                                } else {
                                                                    echo 'text-danger';
                                                                } ?> p-1 "> <?php echo $day; ?> Gün </span>
                                                    <!--gün sayısına göre renk değişecek. -->
                                                @endempty


                                                @empty(!App\Models\Personel::find($card->personel_id))
                                                    <span class="bg-blue-800 rounded-circle  p-1">

                                                        <?php
                                                        $personel = App\Models\Personel::find($card->personel_id);
                                                        $name = $personel->ad . ' ' . $personel->soyad;
                                                        $first = substr($personel->ad, 0, 1);
                                                        $second = substr($personel->soyad, 0, 1);
                                                        $firstSecond = $first . '.' . $second;
                                                        ?>
                                                        <i title="{{ $name }}">{{ $firstSecond }}</i>
                                                    @endempty
                                            </div>
                                        </div>
                                    </li>

                                @endforeach
                            </div>
                            @endempty
                        </ul>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-1">

                            <button onclick="myFunction()" class="btn btn-outline-secondary " type="button" id="eklebtn"><i
                                    class="fa fa-plus-circle mx-1"></i>Ekle</button>
                        </div>

                    </div>
                </div>
                <!--------------/COLON 1 ------------------------->
                <!--------------COLON 2------------------------->
                <div class="col-sm-4 ">

                    <!--------------COLON 2 ------------------------->
                    <div class="card-body ">

                        <ul class="list-group droptrue px-2 bg-light" id="sortable2">

                            @empty(!$iki)


                                @foreach ($iki as $card)



                                    <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1"
                                        id="{{ $card->id }}">
                                        <div class="card-body">
                                            <p class="fs-3"><b>{{ $card->gorev_adi }} </b></p>
                                            <div class="d-flex w-100 justify-content-between">

                                                <span class="text-success p-1 "> <?php echo
                                                    Carbon\Carbon::parse($card->alim_tarihi)->diffInDays($card->teslim_tarihi);
                                                    ?> </span>
                                                <!--gün sayısına göre renk değişecek. -->
                                                <span class="bg-blue-800 rounded-circle  p-1"> <i
                                                        title="Bünyamin Görken">B.G</i></>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endempty
                        </ul>
                    </div>
                    <!--------------/COLON 2 ------------------------->
                </div>
                <!--------------/COLON 2------------------------->
                <!--------------COLON 3 ------------------------->
                <div class="col-sm-4 ">
                    <div class="card-body ">
                        <ul class="list-group droptrue px-2 bg-light" id="sortable3">
                            @empty(!$uc)
                                @foreach ($uc as $card)

                                    <li class="shadow-sm list-group-item list-group-item-action list-group-item-secondary my-1"
                                        id="{{ $card->id }}">
                                        <div class="card-body">
                                            <p class="fs-3"><b>{{ $card->gorev_adi }} </b></p>
                                            <div class="d-flex w-100 justify-content-between">
                                                <span class="text-success p-1 "> <?php echo
                                                    Carbon\Carbon::parse($card->alim_tarihi)->diffInDays($card->teslim_tarihi);
                                                    ?></span>
                                                <!--gün sayısına göre renk değişecek. -->
                                                <span class="bg-blue-800 rounded-circle  p-1"> <i
                                                        title="Bünyamin Görken">B.G</i></>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach
                            @endempty
                        </ul>
                    </div>
                    <!--------------/COLON 3 ------------------------->
                </div>
            </div>
        </div>
        <!----------------LİSTLER SONU-------------------------->
        {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/kartolustur/{{ $id }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5>Görev Bilgileri</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3"> <label for="gorev_adi" class="form-label">Görev Başlığı</label>
                                <input type="text" class="form-control" id="gorev_adi" name="gorev_adi">
                            </div>
                            <div class="mb-3">
                                <label for="gorev_aciklamasi" class="form-label">Görev Açıklaması</label>
                                <textarea class="form-control" id="gorev_aciklamasi" rows="3"
                                    name="gorev_aciklamasi"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label> Teslim Tarihi</label>
                                    <input class="form-control form-control-lg" type="date" placeholder="Teslim Tarihi"
                                        name="teslim_tarihi" id="teslim_tarihi">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <select class="form-select" aria-label="Default select example" name="personel_id"
                                    id="personel_id">
                                    <option selected>Persoel Seç</option>
                                    @foreach ($personeller as $personel)
                                        <option value="{{ $personel->id }}">
                                            {{ $personel->ad . ' ' . $personel->soyad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Onayla</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form  id="updateFormm" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5>Görev Bilgileri</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3"> <label for="gorev_adi" class="form-label">Görev Başlığı</label>
                                <input type="text" class="form-control" id="gorev_adi_modal" name="gorev_adi">
                            </div>
                            <div class="mb-3">
                                <label for="gorev_aciklamasi" class="form-label">Görev Açıklaması</label>
                                <textarea class="form-control" id="gorev_aciklamasi_modal" rows="3"
                                    name="gorev_aciklamasi"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label> Teslim Tarihi</label>
                                    <input class="form-control form-control-lg" type="date" placeholder="Teslim Tarihi"
                                        name="teslim_tarihi" id="teslim_tarihi_modal">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <select class="form-select" aria-label="Default select example" name="personel_id"
                                    id="personel_id_modal">
                                    <option selected>Persoel Seç</option>
                                    @foreach ($personeller as $personel)
                                        <option value="{{ $personel->id }}">
                                            {{ $personel->ad . ' ' . $personel->soyad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type"submit" class="btn btn-primary">Onayla</button>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <script src="{{ URL::asset('assets/js/plan/dropdrag.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plan/button.js') }}">
        < /scrip>

        <
        link rel = "stylesheet"
        href = "//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" >
            <
            link rel = "stylesheet"
        href = "/resources/demos/style.css" >

            <
            link href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
        rel = "stylesheet" >
            <
            script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity = "sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin = "anonymous" >
    </script>

@endsection
