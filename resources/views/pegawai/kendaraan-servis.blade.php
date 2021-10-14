@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title"><a href="{{ route('pegawai.index') }}" class="btn btn-sm btn-warning "><i class="icon"></i> kembali</a> | Data Servis</h6>
                <a href="{{ route('pegawai.kendaraan.servis.tambah',$id) }}" class="btn btn-sm btn-success modal-show" >New Servis</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                    <tr>
                        <th>No.</th> 
                        <th>Nama Pemilik</th>
                        <th>Kebutuhan saat ini</th>
                        <th>kebutuhan selanjutnya</th> 
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    @foreach($data as $r)


                    <tr>
                        <td>{{$no++}}</td> 
                        <td>{{$r->name}}</td>
                        <td>{{$r->kebutuhan_sekarang}}</td>
                        <td>{{$r->kebutuhan_selanjutnya}}</td>
                        <td>{{$r->keterangan}}</td>
                        <td>{{$r->tanggal}}</td>
                        <td></td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>




    </div>


</div>

@endsection