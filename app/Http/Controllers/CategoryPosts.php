<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryPosts extends Controller
{
    public function add_post(){
        return view('admin.addPost') ;
    }
    public function all_post(){
        return view('admin.allPost') ;
    }
    public function wait_post(){
        return view('admin.waitPost') ;
    }
}
