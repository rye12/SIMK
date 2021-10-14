<form action="{{ route('admins.update',$admin->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
             <label for="formGroupExampleInput">Username</label>
            <input name="username" type="text" class="form-control" id="formGroupExampleInput" value="{{ $admin->username }}" disabled>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Nama</label>
            <input name="name" type="text" class="form-control" id="formGroupExampleInput2" value="{{ $admin->name }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input name="email" type="text" class="form-control" id="formGroupExampleInput2" value="{{ $admin->email }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Password</label>
            <input name="password" type="text" class="form-control" id="formGroupExampleInput2" placeholder="kosongi jika tidak ingin mengganti password anda">
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>