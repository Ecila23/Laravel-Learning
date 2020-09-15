<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;
use Auth;

class PostsController extends Controller
{
    public function validatePost(){
        return request()->validate([
            'title' => ['required', request()->_method !== "PUT" ? 'unique:posts,title' : ''],
            'body' => ['required'], 
            'tags' => ['exists:tags,id']
        ]);
    }
    public function createSlugFromTitle($title){
        return str_replace(' ', '-', strtolower($title));
    }

    public function index() {
        if (request('tag')){ 
            $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
        } else if (request('user')){ 
            $posts = User::where('name', request('user'))->firstOrFail()->posts;
        } else {
            $posts = Post::latest()->get();
        }

        return view('posts/index', [
            'posts' => $posts,
            'tags' => \DB::table('tags')->get(),
            'users' => \DB::table('users')->get()
            ]);
    }
    
    public function show(Post $post) {
        return view('posts/show', [
            'post' => $post, 
            'user' => \DB::table('users')->where('id', $post->user_id)->first(),
            ]);

    }

    public function create(){
        return view('posts/create', [
            'tags' => \DB::table('tags')->get()
            ]);
    }

    public function store(){
        $this->validatePost();

        $post = new Post(array_merge(
            [ 
                'slug' => $this->createSlugFromTitle(request('title'))
            ],
            request(['title', 'body'])
            
        ));
        $post->user_id = Auth::user()->id; 
        $post->save();

        $post->tags()->attach(request('tags'));

        return redirect("posts/{$post->slug}");
    }

    public function edit(Post $post){
        return view("posts/edit", [
            'post' => $post, 
            'tags' => \DB::table('tags')->get(),
            ]);
    }

    public function update(Post $post){
        $post->update(
            array_merge(
                ['slug' => $this->createSlugFromTitle(request('title'))], 
                $this->validatePost()
            )
        );

        return redirect("posts/{$post->slug}");
    }

    public function delete(Post $post){
        $post->delete();

        return redirect("posts");
    }
}
