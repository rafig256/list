<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = BlogComment::all();
        return view('admin.comment.index' , compact('comments'));
    }

    public function destroy(BlogComment $comment)
    {
        $comment->delete();
        toastr()->warning('comment deleted successfully');
        return to_route('admin.comment.index');
    }

    public function activate(BlogComment $comment){
        $comment->updateOrFail(['status' => 1]);
        toastr()->success('comment activated successfully');
        return to_route('admin.comment.index');
    }

    public function disable(BlogComment $comment)
    {
        $comment->updateOrFail(['status' => 0]);
        toastr()->success('comment activated successfully');
        return to_route('admin.comment.index');
    }
}
