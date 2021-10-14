<form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="formGroupExampleInput">NIK</label>
        <input name="nik" type="text" class="form-control" id="formGroupExampleInput" value="{{ $pegawai->nik }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Nama</label>
        <input name="nama" type="text" class="form-control" id="formGroupExampleInput" value="{{ $pegawai->name }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Alamat</label>
        <input name="alamat" type="text" class="form-control" id="formGroupExampleInput" value="{{ $pegawai->alamat }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">No. Hp</label>
        <input name="no_hp" type="text" class="form-control" id="formGroupExampleInput2" value="{{ $pegawai->no_hp }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>