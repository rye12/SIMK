<form action="{{ route('item.update',$item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1">NIP Pegawai</label>
        <input name="nip" type="text" class="form-control" autofocus='true' autocomplete="off" value="{{$item->id_pegawai}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Barang</label>
        <select class="custom-select" name="id_barang">
            <option></option>
            @foreach ($jenis as $j)
            <option {{($j->id==$item->id_barang?"selected":"")}} value="{{$j->kode}}">{{$j->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Keterangan</label>
        <input name="keterangan" type="text" class="form-control" autocomplete="off" value="{{$item->keterangan}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Barang</label>
        <select class="custom-select" name="verifikasi">
            <option></option>
            @foreach ($verifikasi as $v)
            <option {{($v->id==$item->verifikasi?"selected":"")}} value="{{$v->id}}">{{$v->nama}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
</form>