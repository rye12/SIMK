@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Pengajuan Barang</h3>
                <a href="#" class="btn btn-sm btn-success modal-show">
                    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Pengajuan</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pegawai</th>
                            <th>Barang</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>




    </div>


</div>

@endsection