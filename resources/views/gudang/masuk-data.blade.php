@extends('layouts.master')

@section('content')

<div class="row">
<div class="col-md-6">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Form Barang Masuk</h3> 
            </div>
            <form method="POST" action="{{ route('gudang.barang.masuk') }}"> @csrf
            <div class="card-body py-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal</label>
                            <input name="tanggal" type="date" class="form-control"   value="{{ date('Y-m-d')}}">
                          </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. Faktur</label>
                            <input name="no_faktur" type="text" class="form-control" placeholder="Masukkan No. Faktur"  required  >
                          </div>
                    </div>
                </div>
                <hr>
                <table   class="table" id="dynamic_field">
                    <tr style="background: #ddd;">
                        <th>Barang</th><th>Jumlah</th><th>Aksi</th> 
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" id="select1" name="barang[]">
                                <option></option>
                                <?php foreach ($barang as $b): ?>
                                    <option value="{{$b->id}}">{{ $b->kode.' - '.$b->nama }}</option> 
                                <?php endforeach ?>
                            </select> 
                        </td>
                        <td>
                            <input type="text" name="jumlah[]" class="form-control">
                        </td>
                        <td>
                            <a href="" class="btn btn-danger"><i class="icon-cross2"></i>  </a> <button  class="btn btn-info" name="add" id="add" type="button"><i class="icon-plus3"></i>  </button>
                        </td>
                    </tr>

                </table>

            </div>
            <div class="card-footer">
                <button class="btn btn-primary">simpan</button>
            </div>
            </form>
        </div>
    </div> 



    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">Data Stock Persediaan Barang</h3>
                <a href=" " class="btn btn-sm btn-success  ">
                    <i class="icon-download" style="margin-right: 5px;"></i>export</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th style="width:1%">No.</th>
                            <th style="width:5%">Kode</th>
                            <th style="width:10%">No. Faktur</th>
                            <th>Tanggal</th>
                            <th>Jumlah Item</th> 
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    @foreach($data as $r)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $r->kode }}</td>
                        <td>{{ $r->no_faktur }}</td>
                        <td>{{ $r->tanggal }}</td>
                        <td>{{ $r->jumlah }}</td>

                    </tr>

                    

                    @endforeach
                </table>
            </div>
        </div> 
    </div> 
</div>

<script type="text/javascript">
 
 $(document).ready(function(){  
      var i=1;  
        


      $('#add').click(function(){  

        var optional='';
         <?php foreach ($barang as $b): ?>
              optional += '<option value="{{$b->id}}">{{ $b->kode.' - '.$b->nama }}</option>'; 
             <?php endforeach ?>

        
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td>'+
             
            '<select id="#select'+i+'"  class="form-control" name="barang[]"><option></option>'+optional+'</select><td><input type="text" name="jumlah[]" class="form-control"></td>'
            
            +'</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="icon-cross2"></i></button>  </td></tr>');  
         
 
            
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      
 });  
 </script> 

@endsection