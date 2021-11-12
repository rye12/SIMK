<form action="{{ route('item.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Pegawai</label>
    <select class="form-control" name="id_pegawai" required>
      <option value="">---- Pilih NIP - Nama ----</option>
      <?php
      foreach ($pegawai as $p) {
      ?>
        <option value="{{$p->id}}">{{$p->nip}} - {{$p->nama}}</option>
      <?php
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Barang</label>
    <select class="custom-select" name="id_barang" required>
      <option selected>---- Pilih Barang ----</option>
      @foreach ($barang as $b)
      <option value="{{$b->id}}">{{$b->nama}}</option>
      @endforeach
    </select>
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
  <div class="form-group">
    <label for="exampleFormControlInput1">Keterangan Barang</label>
    <input name="keterangan" type="text" class="form-control" autocomplete="off" required>
  </div>
  <button type="submit" class="btn btn-primary">
    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Pengajuan</button>
</form>