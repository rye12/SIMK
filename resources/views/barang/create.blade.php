
<form action="{{ route('barang.store') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">Kode</label>
    <input name="kode" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kode barang" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="nama" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama barang" autocomplete="off" >
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlInput1">Deskripsi</label>
    <input name="deskripsi" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan deskripsi barang" >
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
