@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Data Barang</h6>
                <a href="{{ route('barang.create') }}" class="btn btn-sm btn-success modal-show" >New Barang</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
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
                            {{ $r->kode }}
                        </td>
                        <td>
                            {{ $r->nama }}
                        </td>
                        <td>
                            {{ $r->deskripsi }}
                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('barang.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">Edit</a>
                            <form action="{{ route('barang.destroy', $r->id) }}" method="POST">
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