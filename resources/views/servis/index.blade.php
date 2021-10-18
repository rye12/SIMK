@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Data Servis Kendaraan</h6>
                <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-success modal-show" >New Data</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Plat Nomor</th>
                        <th>Nama Pemilik</th>
                        <th>Kebutuhan Sekarang</th>
                        <th>Kebutuhan Selanjutnya</th>  
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
                        <td class="d-flex flex-row">
                            <a href="{{ route('pegawai.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">Edit</a>
                            <form action="{{ route('pegawai.destroy', $r->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('apakah anda ingin menghapus?')">delete</button>
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