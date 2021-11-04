@extends('layouts.master')

@section('content')

<?php
use Carbon\Carbon;
?>

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Notifikasi</h3>
                <a href="{{ route('notifikasi.create') }}" class="btn btn-sm btn-success modal-show">
                    <i class="icon-bell3" style="margin-right: 5px;"></i>
                    Tambah Notifikasi</a>
            </div>
            
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>

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
                            {{ $d->nip }}
                        </td>
                        <td>
                            {{ $d->keterangan }}
                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('notifikasi.edit',$d->id) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('notifikasi.destroy', $d->id) }}" method="POST">
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