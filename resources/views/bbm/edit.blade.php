<form action="{{ route('bbm.update',$bbm->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1">Plat Nomor</label>
        <input name="id_kendaraan" type="text" class="form-control" id="id_kendaraan" value="{{$bbm->id_kendaraan}}" placeholder="Masukkan plat nomor yang baru" autocomplete="FALSE">
    </div>
    <div class="form-group">
        <label>Jenis BBM</label>
        <div style="margin-left: 20px">
            @foreach($jenis as $j)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="id_jenis" id="flexRadioDefault1" {{($j->id==$bbm->id_jenis?"checked":"")}} value="{{$j->id}}">
                <label class="form-check-label" for="flexRadioDefault1">
                    {{$j->nama}}
                </label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Jumlah Liter</label>
            <input name="jumlah_liter" type="text" class="form-control" id="jumlah_liter" value="{{$bbm->jumlah_liter}}" autocomplete="off">
        </div>

        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Nominal</label>
            <input name="nominal" type="text" class="form-control" id="nominal" value="{{$bbm->nominal}}" autocomplete="off">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>