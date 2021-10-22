<form action="{{ route('pajak.update',$pajak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="exampleFormControlInput">NIP</label>
            <input name="id_pegawai" type="text" class="form-control" id="formGroupExampleInput"  value="{{ $pajak->id_pegawai }}"autocomplete="off">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput">Nomor Rangka</label>
            <input name="id_kendaraan" type="text" class="form-control" id="formGroupExampleInput"  value="{{ $pajak->id_kendaraan }}"autocomplete="off">
        </div>

        <div class="form-group">
            <label for="position-option">Jenis Pajak</label>
            <select class="form-control" id="position-option" name="id_jenis">
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
            <select class="form-control" id="position-option" name="id_verifikasi">
            @foreach ($verifikasi as $v)
            <option {{($v->id==$pajak->id_verifikasi?"selected":"")}} value="{{$v->id}}">{{$v->nama}}</option>
            @endforeach
            </select>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update</button>
</form>