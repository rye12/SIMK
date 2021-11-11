<form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="nama" type="text" class="form-control" autofocus="true" autocomplete="off"required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">No. Handphone</label>
      <input name="no_hp" type="text" class="form-control" autocomplete="off" required>
    </div>
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">Alamat</label>
      <input name="alamat" type="text" class="form-control" autocomplete="off" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">NIP</label>
      <input name="nip" type="text" class="form-control" autocomplete="off" required>
    </div>
    <!-- <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">Jabatan</label>
      <input name="id_jabatan" type="text" class="form-control" autocomplete="off">
    </div> -->
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">Jabatan</label>
      <select class="custom-select" name="id_jabatan" required>
        <option selected>Silahkan pilih jabatan</option>
        @foreach ($jabatan as $j)
        <option value="{{$j->id}}">{{$j->nama}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="exampleFormControlInput1">Email</label>
      <input name="email" type="text" class="form-control" autocomplete="off" required>
    </div>
    <div class="form-group col-md-4">
      <label for="exampleFormControlInput1">Username</label>
      <input name="username" type="text" class="form-control" placeholder="Contoh: someone012" autocomplete="off" required>
    </div>
    <div class="form-group col-md-4">
      <label for="exampleFormControlInput1">Password</label>
      <input name="password" type="password" class="form-control" autocomplete="off" required>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Foto</label>
    <input name="foto" type="file" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>