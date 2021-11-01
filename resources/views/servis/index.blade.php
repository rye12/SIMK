@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Data Servis Kendaraan</h3>
                <a href="{{ route('servis.create') }}" class="btn btn-sm btn-success modal-show">
                    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Data</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Kendaraan</th>
                            <th>Pegawai</th>
                            <th>Servis Sekarang</th>
                            <th>Servis Berikutnya</th>
                            <th>Foto</th>
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
                            {{ $r->kendaraan }}
                        </td>
                        <td>
                            {{ $r->pemilik }}
                        </td>
                        <td>
                            <ul>
                                <?php    $skr = DB::table('servis_sekarang as a')->leftjoin('barang as b','a.id_barang','b.id')->where('id_servis',$r->id)->get();   ?>
                            <?php foreach ($skr as $b): ?>
                                <li>{{ $b->nama }}</li>
                            <?php endforeach ?>
                            </ul>
                        </td>
                        <td>
                           <ul>
                                <?php    $skr = DB::table('servis_berikutnya as a')->leftjoin('barang as b','a.id_barang','b.id')->where('id_servis',$r->id)->get();   ?>
                            <?php foreach ($skr as $b): ?>
                                <li>{{ $b->nama }}</li> 
                            <?php endforeach ?>
                              <?php    $skr = DB::table('servis_sekarang as a')->leftjoin('barang as b','a.id_barang','b.id')->where('id_servis',$r->id)->get();   ?>
                            <?php foreach ($skr as $b):
                                $diff  = date_diff( date_create(), date_create(date('Y-m-d', strtotime('+'.$b->bulan.' month', strtotime(date('Y-m-d'))))) );
                                $bulan= $diff->format('  %m bulan lagi');
                             ?>
                                <li>{{ $b->nama }}    | <span style="color: red">{{ number_format($r->kilometer+$b->kilometer,0) }} KM</span>   </li>
                            <?php endforeach ?>
                            </ul>
                        </td>
                        <td><a href="{{route('servis.foto',$r->id)}}" class="btn btn-primary btn-sm modal-show">Lihat</a></td>
                        <td>
                            {{$r->pemilik}}
                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('servis.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('servis.destroy', $r->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('apakah anda ingin menghapus?')">
                                    <i class="icon-bin"></i></button>
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