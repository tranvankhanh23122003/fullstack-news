<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categories;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.post.list', compact('posts'));
    }
    public function create()
    {
        $categories = Categories::all();
        return view('admin.post.create', compact('categories'));
    }
    public function store(Request $request)
    {

            //  $request->validate([
            // 'title' => 'required',
            // 'description' => 'required',
            // 'content' => 'required',
            // 'image' => 'required',
            // 'category_id' => 'required',
            //     ]);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        $slug = Str::slug($request->name);
        $checkslug = Post::where('slug', $slug)->first();
        if ($checkslug) {
            $slug = $checkslug->slug . Str::random(2);
        }
        $image = null; // Đặt giá trị mặc định nếu không có ảnh

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            // Kiểm tra phần mở rộng hợp lệ
            if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {
                $image = Str::random(5) . '-' . $name_file; // Tạo tên file mới
                $destinationPath = public_path('image/post'); // Đường dẫn thư mục lưu
                $file->move($destinationPath, $image); // Lưu file
            }
        }
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            // 'view_counts' => 0,
            'user_id' => 1,
            'new_post' => !!$request->new_post,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'hightlight_post' =>!!$request->hightlight_post,
        ]);
        // return response()->json([
        //     'messenger'=> 'ok' ]);
    //    return redirect()->route('admin.post.index')->with('thanh cong', 'tao thanh cong');
       return redirect()->route('admin.post.index');

    }
    public function edit($id)
    {
       $post = Post::find($id);
       $categories = Categories::all();
       return view('admin.post.edit' , compact('post','categories'));
    }
    public function update(Request $request , $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        $slug = Str::slug($request->name);
        $checkslug = Post::where('slug', $slug)->first();
        if ($checkslug) {
            $slug = $checkslug->slug . Str::random(2);
        }
        $image = null; // Đặt giá trị mặc định nếu không có ảnh

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            // Kiểm tra phần mở rộng hợp lệ
            if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {
                $image = Str::random(5) . '-' . $name_file; // Tạo tên file mới
                $destinationPath = public_path('image/post'); // Đường dẫn thư mục lưu
                $file->move($destinationPath, $image); // Lưu file
            }
        }
        $post = Post::find($id);
$post->update([
    'title' => $request->title,
    'description' => $request->description,
    'content' => $request->content,
    'image' => isset ($image) ? $image : $post->image ,
    'new_post' => !!$request->new_post,
    'slug' => $slug,
    'category_id' => $request->category_id,
    'hightlight_post' =>!!$request->hightlight_post,
]);


        // return response()->json([
        //     'messenger'=> 'ok' ]);
    //    return redirect()->route('admin.post.index')->with('thanh cong', 'tao thanh cong');
       return redirect()->route('admin.post.index');
    }
    public function delete($id)
    {
         Post::where('id' ,$id )->delete();
         return redirect()->route('admin.post.index')->with('thanh cong ' ,'xoa thanh cong');
    }
}
