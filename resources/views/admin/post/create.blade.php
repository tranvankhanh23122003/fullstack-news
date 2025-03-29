@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form  action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" placeholder="Please Enter Category Name" />
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <input class="form-control" name="description" placeholder="Please Enter Category Order" />
                    </div>
                    <div class="form-group">
                        <label>new Post</label>
                        <input  type="checkbox" name="new_post" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>hightlight Post</label>
                        <input type="checkbox" name="hightlight_post" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="demo" name="content" class="ckeditor"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection