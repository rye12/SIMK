@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title"><a href="{{ route('pegawai.index') }}" class="btn btn-sm btn-warning "><i class="icon"></i> kembali</a> | Data Kendaraan</h6>
                <a href="{{ route('pegawai.kendaraan.tambah',$id) }}" class="btn btn-sm btn-success modal-show" >New Kendaraan</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>warna</th>
                        <th>Mesin</th> 
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
                            {{ $r->warna }}
                        </td>
                        <td>
                            {{ $r->mesin }}
                        </td>
                       
                        <td class="d-flex flex-row">
                            <a href="{{ route('kendaraan.edit',$r->id_kendaraan_pegawai) }}" class="btn btn-primary btn-sm modal-show">Edit</a>
                            <form action="{{ route('pegawai.kendaraan.hapus', $r->id_kendaraan_pegawai) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('apakah anda ingin menghapus?')">delete</button>
                            <a href="{{ route('pegawai.kendaraan.servis',$r->id_kendaraan_pegawai) }}" class="btn btn-primary btn-sm">servis</a>

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