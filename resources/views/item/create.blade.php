<form action="{{ route('item.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Pegawai</label>
    <select class="form-control" name="id_pegawai">
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
    <select class="custom-select" name="id_barang">
      <option selected>---- Pilih Barang ----</option>
      @foreach ($barang as $b)
      <option value="{{$b->id}}">{{$b->nama}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Keterangan Barang</label>
    <input name="keterangan" type="text" class="form-control" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary">
    <i class="icon-plus-circle2" style="margin-right: 5px;"></i>Tambah Pengajuan</button>
</form>