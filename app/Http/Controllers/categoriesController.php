<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class categoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('admin.categories.list' ,compact('categories'));
    }
    public function create(){
        return view('admin.categories.create');
    }
    public function store(Request $request ){
        set_time_limit(120);
        $this->validate($request,[
'name' =>"required"
        ]);
       $slug = Str::slug($request->name);
        $checkslug =Categories::where('slug',$slug)->first();
        while($checkslug){
            $slug=$checkslug->slug . Str::random(2);
        }
Categories::create([
    'name'=>$request->name,
'slug'=>$slug,
]);
return redirect()->route('admin.categories.index') ->with('thanh cong' , 'tao thanh cong') ;
    }
    public function edit($id){
        $categories = Categories::find($id);
        return view('admin.categories.edit' ,compact('categories'));
    }
    public function update( Request $request ,$id){
        set_time_limit(120);
        $this->validate($request,[
            'name' =>"required"
                    ]);
                   $slug = Str::slug($request->name);
                    $checkslug =Categories::where('slug',$slug)->first();
                    while($checkslug){
                        $slug=$checkslug->slug . Str::random(2);
                    }
                    $categories = Categories::find($id);
            $categories->update([
                'name'=>$request->name,
            'slug'=>$slug,
            ]);
            return redirect()->route('admin.categories.index',$id) ->with('thanh cong' , 'cap nhat thanh cong') ;
    }
    public function delete($id){
        // $categories = Category::find($id);
       Categories::where('id' ,$id)->delete();
       return redirect()->route('admin.categories.index') ->with(' thanh cong' , 'xoa thanh cong') ;

    }
}
