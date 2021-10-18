<form action="{{ route('barang.update',$barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        @foreach($kategori as $k)
        <div class="form-group">
             <label for="formGroupExampleInput">Kategori</label>
            <input name="kategori" type="text" class="form-control" id="formGroupExampleInput" {{($k->id==barang->id_kategori?"checked";"")}} value="{{$k->id}}" >
        </div>
        @endforeach

        <!-- <div class="form-group">
             <label for="formGroupExampleInput">Kode</label>
            <input name="kode" type="text" class="form-control" id="formGroupExampleInput" value="{{ $barang->kode }}" >
        </div> -->
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