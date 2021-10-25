<form action="{{ route('servis.update',$servis->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="exampleFormControlInput1">Kendaraan</label>

    <select class="form-control" name="id_kendaraan">
      <option value=""></option>
      <?php
      $pegawai = DB::table('kendaraan')->get();
      foreach ($pegawai as $p) {

      ?>
        <option value="{{$p->id}}">{{$p->no_plat}} - {{$p->nama}}</option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">NIP - Pegawai</label>

    <select class="form-control" name="id_pegawai">
      <option value=""></option>
      <?php
      $pegawai = DB::table('pegawai')->get();
      foreach ($pegawai as $p) {

      ?>
        <option value="{{$p->id}}">{{ $p->nip }}</option>
      <?php
      }
      ?>
    </select>
  </div>
    
  <div class="form-group">
    <label for="position-option">Kebutuhan Sekarang</label>
    <select class="form-control" id="position-option" name="kebutuhan_sekarang">
       @foreach ($barang as $kategori)
          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
       @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="position-option">Kebutuhan Selanjutnya</label>
    <select class="form-control" id="position-option" name="kebutuhan_selanjutnya">
       @foreach ($barang as $kategori)
          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
       @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal</label>
    <input name="tanggal" type="text" class="form-control" id="tanggal" value="{{$servis->tanggal}}" placeholder="Masukkan tanggal servis" autocomplete="off" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Keterangan</label>
    <input name="keterangan" type="text" class="form-control" id="keterangan" value="{{$servis->keterangan}}" placeholder="Masukkan keterangan servis" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
