<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\PostFormFields;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;

class PostController extends Controller
{

    public function index()
    {
        return view('admin.post.index')->withPosts(Post::all());
    }

    public function create()
    {
        $data = $this->dispatch(new PostFormFields());

        return view('admin.post.create', $data);
    }

    public function edit($id)
    {
        $data = $this->dispatch(new PostFormFields($id));

        return view('admin.post.edit', $data);
    }

    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->postFillData());
        $post->syncTags($request->get('tags', []));

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('New Post Successfully Created.');
    }

    public function update(PostUpdateRequest $request, $id) {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();
        $post->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()->back()->withSuccess('Post saved');
        }

        return redirect()->route('admin.post.index')->withSuccess('Post saved');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('Post deleted.');
    }
}
