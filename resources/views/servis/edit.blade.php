<form action="{{ route('servis.update',$servis->id) }}" method="POST">
    @csrf
    @method('PUT')
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
   <label for="exampleFormControlInput1">Tanggal</label>
   <input name="tanggal" type="date" class="form-control" value="{{ date('Y-m-d') }}" id="exampleFormControlInput1" placeholder="Contoh : 2021-1-21" autocomplete="off" >
</div>
<div class="form-group">
   <label for="exampleFormControlInput1">Kilometer Sekarang</label>
   <input name="kilometer" type="number" class="form-control"   id="exampleFormControlInput1"  autocomplete="off" >
</div>
<div class="form-group row">
<div class="col-md-6">   
  <label for="position-option">Servis Sekarang</label>
      <table border="1" style="width:100%" class="table table-bordered">
         <tr>
            <td>
               <div id="repeater1" style="width:100%">
                  <!-- Repeater Heading -->
                  <div class="repeater-heading"> 
                     <button type="button" class="btn-sm btn btn-info repeater-add-btn">
                     tambah barang
                     </button>
                  </div>
                  <br>
                  <div class="clearfix"></div>
                  <!-- Repeater Items -->
                  <div class="items" data-group="servis_sekarang">
                     <div class="row">
                        <div class="col-md-10">
                           <div class="form-group">
                              <select class="form-control" id="position-option" data-name="servis_sekarang">
                                <option></option>
                                 @foreach ($barang as $kategori)
                                 <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <button type="button"  class="btn btn-sm btn-danger remove-btn">x</button>
                        </div>
                     </div>
                     <br>
                  </div>
               </div>
            </td>
         </tr>
      </table> 
   <br>
</div>
<div class="col-md-6">   
  <label for="position-option">Servis Berikutnya</label>
      <table border="1" style="width:100%" class="table table-bordered">
         <tr>
            <td>
               <div id="repeater" style="width:100%">
                  <!-- Repeater Heading -->
                  <div class="repeater-heading"> 
                     <button type="button" class="btn-sm btn btn-info repeater-add-btn">
                     tambah barang
                     </button>
                  </div>
                  <br>
                  <div class="clearfix"></div>
                  <!-- Repeater Items -->
                  <div class="items" data-group="servis_berikutnya">
                     <div class="row">
                        <div class="col-md-10">
                           <div class="form-group">
                              <select class="form-control" id="position-option"   data-name="servis_berikutnya">
                                <option></option>  

                                 @foreach ($barang as $kategori)
                                 <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <button type="button"  class="btn btn-sm btn-danger remove-btn">x</button>
                        </div>
                     </div>
                     <br>
                  </div>
               </div>
            </td>
         </tr>
      </table> 
   <br>
</div>
</div>
 
<div class="form-group">
   <label for="exampleFormControlInput1">Keterangan</label>
   <textarea class="form-control" name="keterangan"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<script type="text/javascript">
   function sekrng(){
   
   }
</script>
<script src="{{ url('js/repeater.js') }}" type="text/javascript"></script>
<script> 
   $("#repeater").createRepeater({
       showFirstItemToDefault: true,

   });
   $("#repeater1").createRepeater({
       showFirstItemToDefault: true,
   });
</script>