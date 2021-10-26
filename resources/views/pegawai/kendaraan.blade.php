@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title"><a href="{{ route('pegawai.index') }}" class="btn btn-sm btn-warning "><i class="icon"></i> kembali</a> | Data Kendaraan</h3>
                <a href="{{ route('pegawai.kendaraan.tambah',$id) }}" class="btn btn-sm btn-success modal-show">Tambah Kendaraan</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Plat Nomor</th>
                            <th>warna</th>
                            <th>Mesin</th>
                            <th>Status</th>
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
                            {{ $r->no_plat }}
                        </td>
                        <td>
                            {{ $r->warna }}
                        </td>
                        <td>
                            {{ $r->no_mesin }}
                        </td>
                        <td>
                            <div class="custom-control custom-switch mb-2">
                                <input type="checkbox" class="custom-control-input" id="status{{$r->id_kendaraanPegawai}}" onclick="status({{$r->id_kendaraanPegawai}})" {{$r->status==1?'checked':''}}>
                                <label class="custom-control-label" for="status{{$r->id_kendaraanPegawai}}"></label>
                            </div>
                        </td>

                        <td class="d-flex flex-row">
                            <a href="{{ route('kendaraan.edit',$r->id_kendaraan_pegawai) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('pegawai.kendaraan.hapus', $r->id_kendaraan_pegawai) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('apakah anda ingin menghapus?')">
                                    <i class="icon-bin"></i>
                                </button>
                                <!-- <a href="{{ route('pegawai.kendaraan.servis',$r->id_kendaraan_pegawai) }}" class="btn btn-primary btn-sm">servis</a> -->

                            </form>
                        </td>

                    </tr>

                    @endforeach
                </table>
            </div>
        </div>




    </div>


</div>
<script>
    function status(val) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'post',
            url: '{{url("pegawai/kendaraan-status/")}}/' + val,
            data: {
                _token: "{{ csrf_token() }}",
                dataType: 'json',
                contentType: 'application/json',
            },
            success: function(response) {
                alert('success')
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        })
    }
</script>
@endsection