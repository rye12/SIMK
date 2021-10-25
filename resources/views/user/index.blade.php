@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Data User</h6>
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-success modal-show">New User</a>

            </div>
            <div class="card-body py-0">
                <table id="myTable" class='table'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    @foreach($data as $r)

                    <tr>
                        <td>
                            {{ $no++ }}
                        </td>
                        <td>
                            {{ $r->username }}
                        </td>
                        <td>
                            {{ $r->name }}
                        </td>
                        <td>
                            {{ $r->email }}
                        </td>
                        <td>
                            {{ $r->level }}
                        </td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('user.edit',$r->id) }}" class="btn btn-primary btn-sm modal-show">
                                <i class="icon-pencil"></i>
                            </a>
                            <form action="{{ route('user.destroy', $r->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('apakah anda ingin menghapus?')">
                                    <i class="icon-bin"></i>
                                </button>
                            </form>
                        </td>

                    </tr>

                    @endforeach
                </table>
            </div>
        </div>




    </div>


</div>

@endsection