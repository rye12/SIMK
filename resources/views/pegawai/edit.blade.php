<form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama</label>
        <input name="nama" type="text" class="form-control" value="{{$pegawai->nama}}" autofocus="true" autocomplete="off">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">No. Handphone</label>
            <input name="no_hp" type="text" class="form-control" value="{{$pegawai->no_hp}}" autocomplete="off">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Alamat</label>
            <input name="alamat" type="text" class="form-control" value="{{$pegawai->alamat}}" autocomplete="off">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">NIP</label>
            <input name="nip" type="text" class="form-control" value="{{$pegawai->nip}}" autocomplete="off">
        </div>
        <!-- <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">Jabatan</label>
      <input name="id_jabatan" type="text" class="form-control" autocomplete="off">
    </div> -->
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Jabatan</label>
            <select class="custom-select" name="id_jabatan">
                <option></option>
                @foreach ($jabatan as $j)
                    <option {{($j->id==$pegawai->id_jabatan?"selected":"")}} value="{{$j->id}}">{{$j->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Email</label>
            <input name="email" type="text" class="form-control" value="{{$pegawai->email}}" autocomplete="off">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Username</label>
            <input name="username" type="text" class="form-control" placeholder="Contoh: someone012" value="{{$pegawai->username}}" autocomplete="off">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Kosongi jika password tidak diubah" autocomplete="off">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>