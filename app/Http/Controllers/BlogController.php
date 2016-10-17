<?php

namespace App\Http\Controllers;

use App\Jobs\BlogIndexData;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Post;
use App\Tag;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';
        /*$posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_pages'));*/
        return view($layout , $data);
    }

    public function showPost($slug ,Request $request){
        /*$post = Post::whereSlug($slug)->firstOrFail();*/
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag){
            $tag = Tag::whereTag($tag)->firstOrFail();
        }
        
        return view($post->layout , compact('post','tag'));
    }
}
