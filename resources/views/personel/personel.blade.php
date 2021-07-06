@extends('layout.index')

@section('content')


<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Müşteri Adı</th>
            <th>Telefon Numarası</th>
            <th>Mail Adresi</th>          
            <th class="text-center">Seçenekler</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($personeller as $personel)
        <tr>
            <td>{{$personel->ad ." ". $personel->soyad}}</td>
            <td>{{ $personel->tel_no }}</td>
            <td>{{ $personel->mail_adresi }}</td>
            

            <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
                            <a href="./personel/{{ $personel->id }}/edit" class="dropdown-item"><i class="icon-pencil"></i> Düzenle</a>
                            <form action="/personel/{{ $personel->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item"><i class="icon-trash"></i> Sil</button>
                            </form>
                            {{-- <a href="./personel/{{ $personel->id }}" class="dropdown-item"><i class="icon-search4"></i> İncele</a> --}}

                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>

@endsection

