@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Data Pegawai</h6>
                <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-success modal-show">
                    <i class="icon-user-plus" style="margin-right: 5px;"></i>
                    Tambah Pegawai</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No.Hp</th>
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
                            {{ $r->nip }}
                        </td>
                        <td>
                            {{ $r->nama }}
                        </td>
                        <td>
                            {{ $r->alamat }}
                        </td>
                        <td>
                            {{ $r->no_hp }}
                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('pegawai.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('pegawai.destroy', $r->id) }}" method="POST">
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