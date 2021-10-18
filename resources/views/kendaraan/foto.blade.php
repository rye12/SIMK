<div class="col-md-6">
    <form action="{{ route('kendaraan.foto.upload',$id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="exampleFormControlInput1">Foto</label>
            <input name="foto" type="file" class="form-control" id="warna">
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
<!-- <div class="row">
    @foreach($foto as $f)
    <div class="col-md-6">
        <img src="{{url('files/kendaraan/'.$f->$file)}}" />
    </div>
    @endforeach

</div> -->