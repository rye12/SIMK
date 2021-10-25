<div class="col-md-6">
    <form action="{{ route('pajak.foto.upload',$id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="exampleFormControlInput1">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan deskripsi foto" autocomplete="off">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlInput1">Foto</label>
            <input name="foto" type="file" class="form-control" require>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="icon-file-upload2" style="margin-right: 5px;"></i>Upload</button>
    </form>
</div>
<center>
    <h4>Foto Bukti Pembayaran Pajak</h4>
</center>

<hr>
<div class="row">

    @foreach($foto as $f)
    <img class="col-md-6" src="{{url('files/pajak/'.$f->file)}}" />
    @endforeach

</div>