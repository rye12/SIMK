@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Pengajuan BBM</h6>
                <a href="{{ route('kendaraan.create') }}" class="btn btn-sm btn-success modal-show">
                    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Pengajuan</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Model</th>
                            <th>Jenis</th>
                            <th>No. Rangka</th>
                            <th>NO. Plat</th>
                            <th>No. Mesin</th>
                            <th>Warna</th>
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
                            {{ $r->nama }}
                        </td>
                        <td>
                            {{ $r->jenis }}
                        </td>
                        <td>
                            {{ $r->no_rangka }}
                        </td>
                        <td>
                            {{ $r->no_plat }}
                        </td>
                        <td>
                            {{ $r->no_mesin }}
                        </td>
                        <td>
                            {{ $r->warna }}
                        </td>
                        <td><a href="{{ route('kendaraan.foto',$r->id) }}" class="btn btn-primary btn-sm modal-show">Lihat</a></td>
                        <td>
                            -
                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('kendaraan.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('kendaraan.destroy', $r->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('apakah anda ingin menghapus?')">
                                    <i class="icon-bin"></i>
                                </button>

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