@extends('layout.index')

@section('content')


    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Proje Adı</th>
                <th>Müşteri Adı</th>
                <th>Alım Tarihi</th>
                <th>Teslim Tarihi</th>
                <th>Proje Durumu</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projeler as $proje)
                <tr>
                    <td>{{ $proje->proje_adi }}</td>
                    <td>{{ $proje->ad . ' ' . $proje->soyad }}</td>
                    <td> {{ $proje->alim_tarihi }}</td>
                    <td>{{ $proje->teslim_tarihi }}</td>
                    @if ($proje->aktif_pasif == 1)
                        <td><span class="badge badge-success">Aktif</span></td>
                    @else
                        <td><span class="badge badge-dark">Pasif</span></td>
                    @endif

                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">                                  
                                    <a href="{{ URL::to('proje/'. $proje->id)}} " class="dropdown-item"><i class="icon-file-pdf"></i> İncele</a>
                                    <a href="{{ URL::to('proje/'. $proje->id. '/edit')}}" class="dropdown-item"><i class="icon-file-excel"></i> Güncelle</a>
                                    <form action="/proje/{{ $proje->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item"><i class="icon-trash"></i> Sil</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>




@endsection
