<form action="{{ route('pajak.update',$pajak->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="form-group">
        <label for="exampleFormControlInput">Kendaraan</label>
        <select class="form-control" name="id_kendaraan">
            <option value=""></option>
            <?php
            $pegawai = DB::table('kendaraan')->get();
            foreach ($pegawai as $p) {

            ?>
                <option {{$p->id==$pajak->id_kendaraan?'selected':''}} value="{{$p->id}}">{{$p->no_plat}} - {{$p->nama}}</option>
            <?php
            }
            ?>
        </select>
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
        <input name="nominal" type="text" class="form-control" id="formGroupExampleInput" value="{{ $pajak->nominal }}" autocomplete="off">
    </div>

    <div class="form-group">
        <label for="position-option">Status</label>
        @if(Auth::user()->level === 'admin')
            <select class="form-control" id="position-option" name="id_verifikasi">
                @foreach ($verifikasi as $v)
                <option {{($v->id==$pajak->id_verifikasi?"selected":"")}} value="{{$v->id}}">{{$v->nama}}</option>
                @endforeach
            </select>
        @else
            <select class="form-control" id="position-option" name="id_verifikasi" disabled>
                @foreach ($verifikasi as $v)
                <option {{($v->id==$pajak->id_verifikasi?"selected":"")}} value="{{$v->id}}">{{$v->nama}}</option>
                @endforeach
            </select>

        @endif
    </div>


    <button type="submit" class="btn btn-primary">Update</button>
</form>