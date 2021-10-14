@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Data Kendaraan</h6>
                <a href="{{ route('kendaraan.create') }}" class="btn btn-sm btn-success modal-show" >New Kendaraan</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>nama</th>
                        <th>plat</th>
                        <th>Jenis</th>
                        <th>warna</th>
                        <th>Mesin</th>
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
                            {{ $r->plat }}
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
                        <td> 
                            @if(!empty($r->user->name))
                            {{ $r->user->name }}
                            @else
                            -
                            @endif

                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('kendaraan.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">Edit</a>
                            <form action="{{ route('kendaraan.destroy', $r->id) }}" method="POST">
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