@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit
                    <small>Add</small>
                </h1>
            </div>
            @if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $err )
{{$err}}
    @endforeach
</div>
                @endif
          @if (session('thanhcong'))
          <div class="alert alert-success">
          {{session('thanhcong')}}
      </div>
          @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.user.update' ,$user->id)}}" method="POST">
@csrf
@method('put')
                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" type="name" value="{{$user->name}}" name="name" placeholder="Please Enter Category Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" value="{{$user->email}}" type="email"placeholder="Please Enter Category Order"  readonly/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Confirm</label>
                        <input class="form-control" type="password" name="confirm" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label >Role</label>
                        <label class="radio-inline">
                            <input type="radio" name="is_admin" value="0" @if (!$user->is_admin) checked @endif >User
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_admin" value="1" @if ($user->is_admin) checked @endif checked="">Admin
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Update</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection