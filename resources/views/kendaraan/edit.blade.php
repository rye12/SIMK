<form action="{{ route('kendaraan.update',$kendaraan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1">Model Kendaraan</label>
        <input name="nama" type="text" class="form-control" id="nama" value="{{$kendaraan->nama}}" placeholder="Contoh: Avanza 1.5 Veloz" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Jenis Kendaraan</label>
        <div style="margin-left: 20px">
            @foreach($jenis as $j)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="id_jenis" id="flexRadioDefault1" {{($j->id==$kendaraan->id_jenis?"checked":"")}} value="{{$j->id}}">
                <label class="form-check-label" for="flexRadioDefault1">
                    {{$j->nama}}
                </label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">No. Rangka</label>
            <input name="no_rangka" type="text" class="form-control" id="no_rangka" value="{{$kendaraan->no_rangka}}" autocomplete="off">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">No. Mesin</label>
            <input name="no_mesin" type="text" class="form-control" id="no_mesin" value="{{$kendaraan->no_mesin}}" placeholder="Contoh: 2NRJHDH39874982VE" autocomplete="off">
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">No. Plat</label>
            <input name="no_plat" type="text" class="form-control" id="no_plat" value="{{$kendaraan->no_plat}}" autocomplete="off">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Tanggal Plat</label>
            <input name="tanggal_plat" type="date" class="form-control" id="tanggal_plat" value="{{$kendaraan->tanggal_plat}}" autocomplete="off">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Warna</label>
            <input name="warna" type="text" class="form-control" id="warna" value="{{$kendaraan->warna}}" autocomplete="off">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>