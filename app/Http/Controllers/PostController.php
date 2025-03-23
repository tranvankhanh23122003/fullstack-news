<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('admin.categories.list');
    }
    public function create(){
        return 'ok';
    }
    public function store(){
        return 'ok';
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
