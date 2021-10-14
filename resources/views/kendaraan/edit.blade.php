<form action="{{ route('kendaraan.update',$kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
             <label for="formGroupExampleInput">Nama</label>
            <input name="nama" type="text" class="form-control" id="formGroupExampleInput" value="{{ $kendaraan->nama }}" >
        </div>
        <div class="form-group">
             <label for="formGroupExampleInput">Plat</label>
            <input name="plat" type="text" class="form-control" id="formGroupExampleInput" value="{{ $kendaraan->plat }}" autocomplete="off" >
        </div>
        <div class="form-group">
             <label for="formGroupExampleInput">Jenis</label>
            <input name="jenis" type="text" class="form-control" id="formGroupExampleInput" value="{{ $kendaraan->jenis }}" >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Warna</label>
            <input name="warna" type="text" class="form-control" id="formGroupExampleInput2" value="{{ $kendaraan->warna }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Mesin</label>
            <input name="mesin" type="text" class="form-control" id="formGroupExampleInput2" value="{{ $kendaraan->mesin }}">
        </div>
        <!-- <div class="form-group">
            <label for="formGroupExampleInput2">Pemilik</label>
            <input name="pemilik" type="text" class="form-control" id="formGroupExampleInput2" value="{{ $kendaraan->user_id }}">
        </div> -->
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>