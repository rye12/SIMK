<form action="{{ route('bbm.store') }}" method="POST">
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
    <label>Jenis BBM</label>
    <div style="margin-left: 20px">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="id_jenis" id="flexRadioDefault1" value="1">
        <label class="form-check-label" for="flexRadioDefault1">
          Pertalite
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="id_jenis" id="flexRadioDefault2" value="2">
        <label class="form-check-label" for="flexRadioDefault2">
          Pertamax
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="id_jenis" id="flexRadioDefault2" value="3">
        <label class="form-check-label" for="flexRadioDefault2">
          Solar
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Jumlah Liter</label>
    <input name="jumlah_liter" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan jumlah liter yang telah diisikan" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nominal</label>
    <input name="nominal" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nominal pengisian bbm" autocomplete="off" >
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>