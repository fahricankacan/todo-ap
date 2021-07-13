@extends('layout.calendar_layout')


@section('content')


    <div class="card">

        <div class="card-header">
            <h1 id="car_header_id"></h1>
            <br>
            <p id="card_header_aciklama_id"></p>
        </div>
        <div class="card-body">

            <div id="calendar">


            </div>
        </div>
    </div>


    <script src="{{ URL::asset('assets/js/randevu/ajanda.js') }}"></script>
    



@endsection
