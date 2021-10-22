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
             <label for="formGroupExampleInput">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="formGroupExampleInput" value="{{ $barang->deskripsi }}" >
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
</form>