<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ShowPostController extends Controller
{
    //Hiển thị tất cả bài báo
    public function index(){
        $getPosts = Post::where('status','Publish')->orderBy('id','desc')->simplepaginate(10);
        return view('admins.posts.showDetail')->with([
            'getPosts' => $getPosts,
        ]);
    }

    //Chi tiết 1 bài báo
    public function detail($id){
        $getPost = Post::find($id);
        return view('admins.posts.detail')->with([
            'getPost' => $getPost,
        ]);
    }
}
