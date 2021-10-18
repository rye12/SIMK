<form action="{{ route('servis.store') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">Plat</label>
    <input name="plat" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Plat Nomor Kendaraan" autocomplete="off" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama pemilik" autocomplete="off" >
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlInput1">Kebutuhan Sekarang</label>
    <input name="kebutuhan-sekarang" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kebutuhan kendaraan sekarang" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Kebutuhan Selanjutnya</label>
    <input name="kebutuhan-selanjutnya" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kebutuhan kendaraan selanjutnya" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal</label>
    <input name="tanggal" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan tanggal servis" autocomplete="off" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Keterangan</label>
    <input name="keterangan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan keterangan servis" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
