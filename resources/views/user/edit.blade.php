<form action="{{ route('user.update',$user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="formGroupExampleInput">Username</label>
        <input name="username" type="text" class="form-control" value="{{ $user->username }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Nama</label>
        <input name="name" type="text" class="form-control" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Email</label>
        <input name="email" type="text" class="form-control" value="{{ $user->email }}" disabled>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Password</label>
        <input name="password" type="password" class="form-control" placeholder="kosongi jika tidak ingin mengganti password anda">
    </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Role</label>
    <select class="form-control" id="position-option"   name="level">
      <option>--- Pilih Level User ---</option>  
      <option value='admin'>Admin</option> 
      <option value='user'>User</option>  
    </select>
  </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>