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
    public function store(Request $request){
//         $this->validate($request,[
// "name"=>"required"
//         ]
//        );
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
    public function edit(){
        return 'ok';
    }
    public function update(){
        return 'ok';
    }
    public function delete(){
        return 'ok';
    }
}
