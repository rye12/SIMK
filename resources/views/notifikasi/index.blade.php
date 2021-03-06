@extends('layouts.master')

@section('content')

<?php
use Carbon\Carbon;
?>

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header ">
                <h3 class="card-title">Notifikasi</h3>
                <h5 class="text-muted">Catatan! Notifikasi Akan Hilang dalam Waktu 30 Hari. </h5>
            </div>
            
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    
                    <?php
                    $no = 1;
                    ?>

                    @foreach($data as $d)
                    <?php
                    $current = new Carbon($d->waktu, 'Asia/Jakarta');
                    $time = Carbon::parse($current)->diffForHumans();
                    $di = $current->diffInDays(Carbon::now('Asia/Jakarta'))
                    ?>
                    @if(Auth::user()->id_pegawai == $d->id_pegawai)
                        @if($di <= 30)
                            <div class="alert alert-info">
                                {{ $no++ }}. {{ $d->keterangan}} 
                                <div class="text-muted" style="margin-left: 1px">
                                    Posted: {{ $time }}
                                </div>
                            </div> 
                        @endif 
                    @endif
                    @endforeach
                    @if($no == 1)
                        <h6 class="text-center">Tidak ada notifikasi</h6>
                    @endif
                </table>
            </div>

            

        </div>




    </div>


</div>

@endsection