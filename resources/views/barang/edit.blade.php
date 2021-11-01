<form action="{{ route('barang.update',$barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="position-option">Kategori</label>
            <select class="form-control" id="position-option" name="id_kategori">
            @foreach ($kategori as $k)
            <option {{($k->id==$barang->id_kategori?"selected":"")}} value="{{$k->id}}">{{$k->nama}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput">Kode</label>
            <input name="kode" type="text" class="form-control" id="formGroupExampleInput"  value="{{ $barang->kode }}"autocomplete="off">
        </div>
        <div class="form-group">
             <label for="formGroupExampleInput">Nama</label>
            <input name="nama" type="text" class="form-control" id="formGroupExampleInput" value="{{ $barang->nama }}" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Jangka Waktu Pemakaian (optional)</label>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Bulan</label>
                  <input name="bulan" type="jenis" class="form-control" id="exampleFormControlInput1" value="{{ $barang->bulan }}" placeholder="Masukkan bulan" autocomplete="off">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Kilometer</label>
                  <input name="kilometer" type="jenis" class="form-control" id="exampleFormControlInput1" value="{{ $barang->kilometer }}" placeholder="Masukkan kilometer" autocomplete="off">
                </div>
              </div>
            </div>

          </div>
        <div class="form-group">
             <label for="formGroupExampleInput">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="formGroupExampleInput" value="{{ $barang->deskripsi }}" >
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
</form>