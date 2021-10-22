<form action="{{ route('pajak.store') }}" method="POST">
  @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">NIP</label>
    <input name="nip" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan NIP" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">No Rangka</label>
    <input name="no_rangka" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama barang" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Jenis Pajak</label>
    <input name="id_jenis" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama barang" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nominal</label>
    <input name="nominal" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan deskripsi barang">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>