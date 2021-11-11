<form action="{{ route('pajak.store') }}" method="POST">
  @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Kendaraan</label>

    <select class="form-control" name="id_kendaraan" required>
      <option value="" ></option>
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
    <label for="exampleFormControlInput1">Jenis Pajak</label>
    <select class="form-control" name="id_jenis" required>
      <option value=""></option>
      <?php
      $pegawai = DB::table('pajak_jenis')->get();
      foreach ($pegawai as $p) {

      ?>
        <option value="{{$p->id}}"> {{$p->nama}}</option>
      <?php
      }
      ?>
    </select>

  </div>
  
  <div>
    <label>Tambahkan Plat Untuk Perpanjangan Pajak 5 Tahun</label>
  </div>
  <div id="create-ticket-buttons" class="form-group">
    <button class='create-ticket btn btn-success'>Tambah Plat Nomor</button>
  </div>
  <div id='tickets' class="form-group" style="margin-bottom: 15px">

  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nominal</label>
    <input name="nominal" type="jenis" class="form-control" id="nominal" placeholder="Masukkan nominal pajak" required>
  </div>


<script>
function createTicketComponent(type) {
  type = type || null;

  var elements    = [],
      rootElement = document.createElement('div'),
      price       = type === 'FREE' ? 0 : '';

  elements.push('<input type="text" name="plat_baru" class="form-control" placeholder="Masukkan Plat Nomor Baru" />');
	
  rootElement.innerHTML = elements.join('');
  
  return rootElement;
}


function createFreeTicketComponent() {
  return createTicketComponent('FREE');
}


function onClickCreateTicketButton(event) {
  var button    = event.target,
      container = document.querySelector('#tickets'),
      component;

  if(button.classList.contains('free')) {
    component = createFreeTicketComponent();
  } else {
    component = createTicketComponent();
  }

  container.appendChild(component);
}


var buttonsGroup = document.getElementById('create-ticket-buttons');
buttonsGroup.addEventListener('click', onClickCreateTicketButton);
</script>


  <button type="submit" class="btn btn-primary">Submit</button>