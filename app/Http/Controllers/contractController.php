<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contractController extends Controller
{
    public function index(){
        return view('admin.categories.list');
    }

    public function delete(){
        return 'ok';
    }
}
