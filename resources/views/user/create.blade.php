<form action="{{ route('user.store') }}" method="POST">
  @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Username</label>
    <input name="username" type="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username yang Diinginkan" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="name" type="Name" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Anda" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@contoh.com" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleFormControlInput1" required>
  </div>
  @if(Auth::user()->level == 'admin')
  <div class="form-group">
    <label for="exampleFormControlInput1">Role</label>
    <select class="form-control" id="position-option"   name="level">
      <option>--- Pilih Level User ---</option>  
      <option value='admin'>Admin</option> 
      <option value='user'>User</option>  
    </select>
  </div>
  @endif
  <button type="submit" class="btn btn-primary">Submit</button>