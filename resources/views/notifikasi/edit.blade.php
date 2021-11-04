<form action="{{ route('notifikasi.update', $notif->id) }}" method="POST">
  @csrf
  @method('PUT')
    <div class="form-group">
        <label>Nama</label>

        <select class="form-control" name="id_pegawai">
            <option value=""></option>
            @foreach ($pegawai as $p)
                <option {{($p->id==$notif->id_pegawai?"selected":"")}} value="{{$p->id}}">{{$p->nip}} - {{$p->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="3">{{ $notif->keterangan }}</textarea>
    </div>


  <button type="submit" class="btn btn-primary">Submit</button>