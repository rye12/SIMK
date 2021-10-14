<form action="{{ route('pegawai.store') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">NIK</label>
    <input name="nik" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kendaraan anda" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="nama" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nomor kendaraan anda" autocomplete="off" >
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlInput1">Alamat</label>
    <input name="alamat" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan jenis kendaraan anda" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">No. Hp</label>
    <input name="no_hp" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan warna kendaraan Anda" >
  </div>
  

  
  <button type="submit" class="btn btn-primary">Submit</button>