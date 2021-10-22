<form action="{{ route('pajak.update',$pajak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="exampleFormControlInput">Pegawai</label>
            <input name="pegawai" type="text" class="form-control" id="formGroupExampleInput"  value="{{ $pegawai->nama }}"autocomplete="off">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput">Kendaraan</label>
            <input name="kendaraan" type="text" class="form-control" id="formGroupExampleInput"  value="{{ $kendaraan->nama }}"autocomplete="off">
        </div>

        <div class="form-group">
            <label for="position-option">Jenis Pajak</label>
            <select class="form-control" id="position-option" name="jenis_pajak">
            @foreach ($pajak_jenis as $ij)
            <option {{($ij->id==$pajak->id_jenis?"selected":"")}} value="{{$ij->id}}">{{$ij->nama}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput">Nominal</label>
            <input name="nominal" type="text" class="form-control" id="formGroupExampleInput"  value="{{ $pajak->nominal }}"autocomplete="off">
        </div>

        <div class="form-group">
            <label for="position-option">Status</label>
            <select class="form-control" id="position-option" name="status">
            @foreach ($verifikasi as $v)
            <option {{($v->id==$pajak->id_verifikasi?"selected":"")}} value="{{$v->id}}">{{$v->nama}}</option>
            @endforeach
            </select>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update</button>
</form>