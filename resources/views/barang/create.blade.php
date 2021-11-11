<form action="{{ route('barang.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="position-option">Kategori</label>
    <select class="form-control" id="position-option" name="id_kategori">
       @foreach ($kategori as $kategori)
          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
       @endforeach
    </select>
  </div>

   
  <div class="form-group">
    <label for="exampleFormControlInput1">Kode</label>
    <input name="kode" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama barang" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="nama" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama barang" autocomplete="off" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Jangka Waktu Pemakaian (optional)</label>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Bulan</label>
          <input name="bulan" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan bulan" autocomplete="off">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Kilometer</label>
          <input name="kilometer" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan kilometer" autocomplete="off">
        </div>
      </div>
    </div>

  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Deskripsi</label>
    <input name="deskripsi" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan deskripsi barang" required>
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>