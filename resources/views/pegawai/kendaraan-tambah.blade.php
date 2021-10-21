<form action="{{ route('pegawai.kendaraan.simpan',$id) }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Pilih Kendaraan</label>
    <select name="id_kendaraan" id="" class="form-control">
      <option value=""></option>
      @foreach($kendaraan as $row)
      <option value="{{ $row->id }}">{{ $row->no_plat }} - {{ $row->nama }}</option>
      @endforeach
    </select>
  </div>
  <input name="id_pegawai" value="{{ $id }}" type="hidden">

  <button type="submit" class="btn btn-primary">Submit</button>