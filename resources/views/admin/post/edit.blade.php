@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>Edit</small>
                </h1>
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
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form  action="{{route('admin.post.update' , $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}" @if ($post->category_id==$category->id) select

                            @endif> {{$category->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" value="{{$post->title}}" placeholder="Please Enter Category Name" />
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <input class="form-control" name="description" value="{{$post->description}}"  placeholder="Please Enter Category Order" />
                    </div>
                    <div class="form-group">
                        <label>new Post</label>
                        <input  type="checkbox" name="new_post" @if ($post->new_post) checked

                        @endif placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>hightlight Post</label>
                        <input type="checkbox" name="hightlight_post"  @if ($post->hightlight_post) checked

                        @endif placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="demo" name="content" class="ckeditor">{!! $post->content !!}</textarea>

                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection