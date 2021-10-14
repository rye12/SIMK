


<form action="{{ route('pegawai.kendaraan.servis.simpan',$id) }}" method="POST">
    @csrf
  <input type="hidden" name="id_pegawai" value="{{$val->id_pegawai}}">
  <div class="form-group">
    <label>Kendaraan </label>
    <input type="txt" readonly="" name="" class="form-control"  value="{{ $val->plat }} - {{ $val->nama }}">
  </div>
  <div class="form-group">
  	<label>Kebutuhan Saat ini</label>
  	<textarea class="form-control" name="kebutuhan_sekarang" placeholder="Kebutuhan saat ini"></textarea>
  </div>
  <div class="form-group">
  	<label>Kebutuhan yang akan datang</label>
  	<textarea class="form-control" name="kebutuhan_selanjutnya" placeholder="Kebutuhan yang akan datang"></textarea>
  </div>
  <div class="form-group">
  	<label>Tanggal</label>
  	<input type="date" value="{{date('Y-m-d')}}" class="form-control" name="tanggal">
  </div>
  <div class="form-group">
  	<label>keterangan</label>
  	<textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
