@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Pengajuan Barang</h3>
                <a href="{{ route('item.create') }}" class="btn btn-sm btn-success modal-show">
                    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Pengajuan</a>

            </div>
            <div>
                @if($errors->any())
                <h6 class="alert alert-danger">{{$errors->first()}}</h6>
                @endif
            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pegawai</th>
                            <th>Barang</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Status</th>
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
                            {{ $d->nip }} - {{ $d->nama }}
                        </td>
                        <td>
                            {{ $d->barang }}
                        </td>
                        <td>
                            {{ $d->keterangan }}
                        </td>
                        <td>
                            {{ $d->verifikasi }}
                        </td>
                        <td><a href="{{route('item.foto',$d->id)}}" class="btn btn-primary btn-sm modal-show">Lihat</a></td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('item.edit',$d->id)  }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('item.destroy',$d->id)  }}" method="POST">
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