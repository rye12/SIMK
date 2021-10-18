<form action="{{ route('barang.store') }}" method="POST">
  @csrf

  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label">Kategori</label>

    <div class="col-md-6">
      <select name="kategori" id="kategori" class="form-control">
        <option value="">== Pilih Kategori ==</option>
        @foreach ($kategoris as $k => $nama)
        <option value="{{ $k }}">{{ $nama }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <!-- <div class="form-group">
    <label for="exampleFormControlInput1">Kategori</label>
    <input name="kode" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kode barang" >
  </div> -->
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="nama" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama barang" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Deskripsi</label>
    <input name="deskripsi" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan deskripsi barang">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>