<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
       // return $request->all();

        Post::create($request->all());

        return redirect('posts');

    }

    public function show($id)
    {
        $posts = Post::findOrFail($id);

        return view('posts.show', compact('posts'));
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts'));
        
    }

    public function update(Request $request, $id)       
    {
        $posts = Post::findOrFail($id);

        $posts->update($request->all());
        return redirect('/posts');
    }

    public function destroy($id)
    {
        $posts = Post::findOrFail($id);

        $posts->delete();

        return redirect('/posts');
    }

    public function contact()
    {
        # code...
    }

}
