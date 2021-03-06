@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Data Kendaraan</h3>
                @if(Auth::user()->level == 'admin')
                <a href="{{ route('kendaraan.create') }}" class="btn btn-sm btn-success modal-show">
                    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Kendaraan</a>
                @endif

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Model</th>
                            <th>Jenis</th>
                            <th>No. Rangka</th>
                            <th>No. Plat</th>
                            <th>Tanggal Plat</th>
                            <th>No. Mesin</th>
                            <th>Warna</th>
                            @if(Auth::user()->level == 'admin')
                            <th>Foto</th>
                            @endif
                            <th>Pemilik</th>
                            @if(Auth::user()->level == 'admin')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    @foreach($data as $d)

                    <tr>
                        <td>
                            {{ $no++ }}
                        </td>
                        <td>
                            {{ $d->nama }}
                        </td>
                        <td>
                            {{ $d->jenis }}
                        </td>
                        <td>
                            {{ $d->no_rangka }}
                        </td>
                        <td>
                            {{ $d->no_plat }}
                        </td>
                        <td>
                            {{ $d->tanggal_plat }}
                        </td>
                        <td>
                            {{ $d->no_mesin }}
                        </td>
                        <td>
                            {{ $d->warna }}
                        </td>
                        @if(Auth::user()->level == 'admin')
                        <td><a href="{{ route('kendaraan.foto',$d->id) }}" class="btn btn-primary btn-sm modal-show">Lihat</a></td>
                        @endif
                        <td>
                            {{ $d->pemilik }}
                        </td>
                        @if(Auth::user()->level == 'admin')
                        <td class="d-flex flex-row">
                            <a href="{{ route('kendaraan.edit',$d->id) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('kendaraan.destroy', $d->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('apakah anda ingin menghapus?')">
                                    <i class="icon-bin"></i>
                                </button>

                            </form>
                        </td>
                        @endif

                    </tr>

                    @endforeach
                </table>
            </div>
        </div>




    </div>


</div>

@endsection