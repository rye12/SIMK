<form action="{{ route('notifikasi.store') }}" method="POST">
  @csrf
    <div class="form-group">
        <label>Nama</label>

        <select class="form-control" name="id_pegawai" required>
            <option value=""></option>
            @foreach ($pegawai as $p)
            <option value="{{$p->id}}">{{$p->nip}} - {{$p->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Kendaraan</label>

        <select class="form-control" name="id_kendaraan" required>
            <option value=""></option>
            @foreach ($kendaraan as $k)
            <option value="{{$k->id}}">{{$k->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="3" required></textarea>
    </div>


  <button type="submit" class="btn btn-primary">Submit</button>