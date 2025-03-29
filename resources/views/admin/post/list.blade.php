@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>title</th>
                        <th>image</th>
                        <th>categoties</th>
                        <th>hightlight post</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post )
                    <tr class="odd gradeX" align="center">
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td><img style="width:100px ; height :100px"  src="{{ asset('image/post/' . $post->image) }}" alt="Hình ảnh bài viết">
                        </td>
                        <td>{{$post->categories->name}}</td>
                        <td>{{$post->hightlight_post ==1 ? "x":""}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection