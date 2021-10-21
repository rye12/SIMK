@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Data Servis Kendaraan</h3>
                <a href="{{ route('servis.create') }}" class="btn btn-sm btn-success modal-show">
                    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Data</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Plat Nomor</th>
                            <th>ID Pegawai</th>
                            <th>Kebutuhan Sekarang</th>
                            <th>Kebutuhan Selanjutnya</th>
                            <th>Foto</th>
                            <th>Pemilik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    @foreach($data as $r)

                    <tr>
                        <td>
                            {{ $no++ }}
                        </td>
                        <td>
                            {{ $r->id_kendaraan }}
                        </td>
                        <td>
                            {{ $r->id_pegawai }}
                        </td>
                        <td>
                            {{ $r->kebutuhan_sekarang }}
                        </td>
                        <td>
                            {{ $r->kebutuhan_selanjutnya }}
                        </td>
                        <td><a href="{{route('servis.foto',$r->id)}}" class="btn btn-primary btn-sm modal-show">Lihat</a></td>
                        <td>
                            @if(!empty($r->user->name))
                            {{$r->user->name}}
                            @else
                            -
                            @endif

                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('servis.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('servis.destroy', $r->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('apakah anda ingin menghapus?')">
                                    <i class="icon-bin"></i></button>
                            </form>
                        </td>

                    </tr>

                    @endforeach
                </table>
            </div>
        </div>




    </div>


</div>

@endsection