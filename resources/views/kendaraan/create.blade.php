<form action="{{ route('kendaraan.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Model Kendaraan</label>
    <input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contoh: Avanza 1.5 Veloz" autofocus='true' autocomplete="false">
  </div>
  <div class="form-group">
    <label>Jenis Kendaraan</label>
    <div style="margin-left: 20px">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="id_jenis" id="flexRadioDefault1" value="1">
        <label class="form-check-label" for="flexRadioDefault1">
          Roda 2
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="id_jenis" id="flexRadioDefault2" value="2">
        <label class="form-check-label" for="flexRadioDefault2">
          Roda 3
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="id_jenis" id="flexRadioDefault2" value="3">
        <label class="form-check-label" for="flexRadioDefault2">
          Roda 4
        </label>
      </div>
    </div>
  </div>
  <!-- <div class="form-group">
    <label for="exampleFormControlInput1">Jenis Kendaraan</label>
    <input name="id_jenis" type="jenis" class="form-control" id="exampleFormControlInput1" autocomplete="off">
  </div> -->
  <div class="form-inline">
    <div class="form-group">
      <label for="exampleFormControlInput1">No. Rangka</label>
      <input name="no_rangka" type="text" class="form-control" id="exampleFormControlInput1" autocomplete="false">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">No. Plat</label>
      <input name="no_plat" type="text" class="form-control" id="exampleFormControlInput1" autocomplete="false">
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">No. Mesin</label>
    <input name="no_mesin" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contoh: 2NRJHDH39874982VE" autocomplete="false">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Warna</label>
    <input name="warna" type="text" class="form-control" id="exampleFormControlInput1" autocomplete="false">
  </div>

  <button type="submit" class="btn btn-primary">
    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Kendaraan</button>