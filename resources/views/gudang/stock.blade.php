@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Data Stock Persediaan Barang</h3>
                <a href=" " class="btn btn-sm btn-success  ">
                    <i class="icon-download" style="margin-right: 5px;"></i>export</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th style="width:1%">No.</th>
                            <th style="width:5%">Kode</th>
                            <th style="width:10%">Kategori</th>
                            <th>Nama</th>
                            <th>Stok</th> 
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    @foreach($data as $r)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $r->kode }}</td>
                        <td>{{ $r->kategori }}</td>
                        <td>{{ $r->nama }}</td>
                        <td>{{ $r->stock }}</td>

                    </tr>

                    

                    @endforeach
                </table>
            </div>
        </div>




    </div>


</div>

@endsection