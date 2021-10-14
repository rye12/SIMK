


<form action="{{ route('users.store') }}" method="POST">
    @csrf
    
  <div class="form-group">
    <label for="exampleFormControlInput1">Username</label>
    <input name="username" type="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username yang Diinginkan" >
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input name="name" type="Name" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Anda" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@contoh.com">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleFormControlInput1" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
