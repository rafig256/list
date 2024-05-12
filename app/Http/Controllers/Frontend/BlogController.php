<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogShowCommon($post){
        $post->increment('views');
        $popularPosts = Post::query()->where('is_popular' , 1 )->where('id','!=',$post->id)->take(5)->get();
        $blogCategories = BlogCategory::query()->withCount([
            'posts' => function($query){
                $query->where('status' , 1);
            }
        ])->where('status' , 1)->get();

        return ['blogCategories' => $blogCategories,'popularPosts' => $popularPosts];
    }
    public function blogShow(Post $post)
    {
        $data = $this->blogShowCommon($post);
        $blogCategories = $data['blogCategories'];
        $popularPosts = $data['popularPosts'];
        return view('frontend.pages.blog-view' , compact('post' , 'blogCategories','popularPosts'));
    }

    public function blogShowWithSlug( $id ,Post $post)
    {
        if ($post->id !== (int) $id){
            abort( 403,'The link you are looking for does not exist');
        }
        $data = $this->blogShowCommon($post);
        $blogCategories = $data['blogCategories'];
        $popularPosts = $data['popularPosts'];

        return view('frontend.pages.blog-view' , compact('post','blogCategories' , 'popularPosts'));
    }

    public function blog(Request $request)
    {
        $posts = Post::query()->where('status' , 1)
            ->when($request->has('search') && $request->filled('search'), function($query) use($request){
                $query->where('title' , 'LIKE' , '%'.$request->search.'%')
                    ->orWhere('description' , 'LIKE' , '%'.$request->search.'%');
            })
            ->when($request->has('category') && $request->filled('category'), function ($query) use ($request){
                $query->whereHas('blogCategories' , function ($subQuery) use ($request){
                    $subQuery->where('slug',$request->category );
                });
            })
            ->paginate(6);
        return view('frontend.pages.blog-index',compact('posts'));
    }

    public function comment(Request $request)
    {
        $request->validate(['comment' => 'required|string|max:500','post_id' => 'exists:posts,id']);
        BlogComment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'status' => 0,
        ]);

        toastr()->success('Comment added successfully!');

        return redirect()->back();
    }
}
