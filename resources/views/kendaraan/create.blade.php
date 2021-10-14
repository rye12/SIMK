


<form action="{{ route('kendaraan.store') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kendaraan anda" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">plat</label>
    <input name="plat" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nomor kendaraan anda" autocomplete="off" >
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlInput1">Jenis</label>
    <input name="jenis" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan jenis kendaraan anda" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Warna</label>
    <input name="warna" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan warna kendaraan Anda" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Mesin</label>
    <input name="mesin" type="mesin" class="form-control" id="exampleFormControlInput1" placeholder="jenis mesin / nomor mesin">
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
