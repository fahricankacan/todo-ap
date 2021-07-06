@extends('layout.index')


@section('content')


    <div class="row row-cols-1 row-cols-md-3 g-4">


        @foreach ($projeler as $proje)
            <div class="col">
                <div class="card proje_carti" id="{{ $proje->id }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $proje->proje_adi }}</h5>
                        <p class="card-text text-truncate">{{ $proje->proje_aciklamasi }}</p>
                    </div>
                    <div class="card-footer d-flex flex-column  justify-content-start">
                        <span>Teslim Tarihi:{{ $proje->alim_tarihi }}</span>
                        <span>Durum:
                            @if ($proje->aktif_pasif == 1)
                                <i class=" badge bg-success text-wrap">
                                    <?php echo 'Aktif'; ?>

                                @else
                                    <i class=" badge bg-danger text-wrap">
                                        <?php echo 'Pasif'; ?>
                            @endif

                            </i>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        $('.proje_carti').click(function() {
            let baseUrl = "<?php echo url('/'); ?>";
            window.location.href = baseUrl + "/plan/" + this.id;
        });
    </script>

    {{-- <script src="{{ URL::asset('assets/js/plan/proje-cardlari.js') }}"></script> --}}

@endsection
