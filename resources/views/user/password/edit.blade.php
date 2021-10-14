@extends('layouts.master')

@section('content')
<form action="{{ route('update.password',$user->id) }}" method="POST" >
    @csrf
    @method('patch')
  <div class="form-group">
    <label for="exampleInputpassword">Old Password</label>
    <input name="old_password" type="password" class="form-control" id="exampleInputpassword" aria-describedby="emailHelp" placeholder="Enter old password">
    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input name="new_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection