<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //Hiển thị danh sách bài báo
    public function create()
    {
        $getAll = Post::orderBy('id', 'desc')->simplepaginate(10);

        return view('admins.posts.index')->with([
            'getAll' => $getAll,
        ]);
    }

    //
    public function updateSelectStatus(Request $request)
    {
         Post::where('id', $request->id)
             ->update(['status' => $request->status]);

        return back();
    }

    //Xóa bài báo đã lấy về
    public function delete($id)
    {
        $deletePost = Post::find($id);
        if (empty($deletePost)) {
            return back()->with('message', 'Thao tác lỗi mời bạn ấn lại thao tác xóa');
        }
        $deletePost->delete();

        return back()->with('message', 'Xóa bài báo thành công');
    }

}
