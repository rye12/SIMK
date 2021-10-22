<form action="{{ route('pajak.store') }}" method="POST">
  @csrf

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
    <label for="exampleFormControlInput1">Jenis Pajak</label>
    <select class="form-control" name="id_jenis">
      <option value=""></option>
      <?php
      $pegawai = DB::table('pajak_jenis')->get();
      foreach ($pegawai as $p) {

      ?>
        <option value="{{$p->id}}"> {{$p->nama}}</option>
      <?php
      }
      ?>
    </select>

  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nominal</label>
    <input name="nominal" type="jenis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan deskripsi barang">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>