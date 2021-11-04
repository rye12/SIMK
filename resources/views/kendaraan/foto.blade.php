<div class="col-md-6">
    <form action="{{ route('kendaraan.foto.upload',$id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="exampleFormControlInput1">Foto</label>
            <input name="foto" type="file" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="icon-file-upload2" style="margin-right: 5px;"></i>Upload</button>
    </form>
</div>
<center>
    <h4>Foto Kendaraan</h4>
</center>

<hr>
<div class="row">



    @foreach($foto as $f)
    <img class="col-md-6" src="{{url('files/kendaraan/'.$f->file)}}" />
    @endforeach

</div>