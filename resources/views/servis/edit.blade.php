<form action="{{ route('servis.update',$servis->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="exampleFormControlInput1">Plat</label>
    <input name="plat" type="text" class="form-control" id="plat" value="{{$servis->id_kendaraan}}" placeholder="Masukkan Plat Nomor Kendaraan" autocomplete="off" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="nama" type="jenis" class="form-control" id="nama" value="{{$servis->id_pegawai}}"placeholder="Masukkan nama pemilik" autocomplete="off" >
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlInput1">Kebutuhan Sekarang</label>
    <input name="kebutuhan-sekarang" type="text" class="form-control" id="kebutuhan_sekarang" value="{{$servis->kebutuhan_sekarang}}" placeholder="Masukkan kebutuhan kendaraan sekarang" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Kebutuhan Selanjutnya</label>
    <input name="kebutuhan-selanjutnya" type="text" class="form-control" id="kebutuhan_selanjutnya" value="{{$servis->kebutuhan_selanjutnya}}" placeholder="Masukkan kebutuhan kendaraan selanjutnya" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal</label>
    <input name="tanggal" type="text" class="form-control" id="tanggal" value="{{$servis->tanggal}}" placeholder="Masukkan tanggal servis" autocomplete="off" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Keterangan</label>
    <input name="keterangan" type="text" class="form-control" id="keterangan" value="{{$servis->keterangan}}" placeholder="Masukkan keterangan servis" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
