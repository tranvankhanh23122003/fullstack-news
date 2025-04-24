<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Str;
class userController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.list' ,compact('users'));
    }
    public function create(){
        return view('admin.user.create' );
    }
    public function store(Request  $request){
        $this->validate($request ,[
'name' => 'required',
'email'=>'required|unique:users|email',
'password'=>'required|min:6|max:20',
'confirm' =>'required|same:password',
'is_admin' => 'required',
        ]);
        User::create([
'name' =>$request->name,
'email' =>$request->email,
'password' =>bcrypt($request->password),
'is_admin' =>$request->is_admin,

        ]);
        return redirect()->route('admin.user.index')->with('sucsses' ,'created sucsses');
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request ,$id){
        $this->validate($request ,[
            'name' => 'required',
            'is_admin'=>'required',

                    ]);
                    $user =User::find($id);
                    // Cach 1
                    $updateData = [
                        'name' => $request->name,
                        'is_admin' => $request->is_admin,
                    ];
                    // Cach 2

                    // $data = [
                    //     'name' => $request->name,
                    //     'is_admin' =>$request->is_admin ,
                    // ];
                    // $user->update($data);
                    if($request->password){
                        $this->validate($request ,[
                            'password'=> 'required|min:6|max:32',
                            'confirm' => 'same:password'
                        ]);
                       $updateData['password'] = bcrypt($request->password);
                    }
                User::where('id',$id)->update($updateData);

                    return redirect()->route('admin.user.index',$user->id)->with('sucsses' ,'update súcesss');

    }
    public function delete($id){
        User::where('id' ,$id)->delete();
        return redirect()->route('admin.user.index')->with('succsess' , 'delete sucssec');
    }
}
