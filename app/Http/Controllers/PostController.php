<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $post = new Post();
        $post->title = $validated['title'];
        $post->subtitle = $validated['subtitle'];
        $post->content = $validated['content'];
        $post->expirable = $validated['expirable'];
        $post->commentable = $validated['commentable'];
        $post->private = $validated['access'] == 'private';
        $post->user_id = $request->user()->id;
        $post->save();

        // response 201 Created
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->title = $validated['title'];
        $post->subtitle = $validated['subtitle'];
        $post->content = $validated['content'];
        $post->expirable = $validated['expirable'];
        $post->commentable = $validated['commentable'];
        $post->private = $validated['private'];
        $post->save();

        // response 204 No Content
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        // response 204 No Content
        return redirect('/post');
    }
}
