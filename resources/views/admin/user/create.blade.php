@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            @if ($errors->any())
            @foreach ($errors->all() as $err  )
            <p style="color: red">
                {{$err}}
            </p>
            @endforeach
                        @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.user.store')}}" method="POST">
@csrf
                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" type="name" name="name" placeholder="Please Enter Category Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Please Enter Category Order" />
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
                        <label >Is Admin</label>
                        <label class="radio-inline">
                            <input type="radio" name="is_admin" value="0" checked>User
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_admin" value="1" checked="">Admin
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Category Add</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection