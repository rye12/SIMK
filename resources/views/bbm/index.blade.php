@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Data Pengajuan BBM</h3>
                <a href="{{ route('bbm.create') }}" class="btn btn-sm btn-success modal-show">
                    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Data</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kendaraan</th>
                            <th>NIP</th>
                            <th>Jenis BBM</th>
                            <th>Jumlah Liter</th>
                            <th>Nominal</th>
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
                            {{ $r->kendaraan }}
                        </td>
                        <td>
                            {{ $r->nip_pegawai }}
                        </td>
                        <td>
                            {{ $r->jenis }}
                        </td>
                        <td>
                            {{ $r->jumlah_liter }}
                        </td>
                        <td>
                            {{ $r->nominal }}
                        </td>
                        <td><a href="{{route('servis.foto',$r->id)}}" class="btn btn-primary btn-sm modal-show">Lihat</a></td>
                        <td>
                            {{$r->pemilik}}
                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('bbm.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('bbm.destroy', $r->id) }}" method="POST">
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