<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Photo;
use App\Category;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostsEditRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PostsCreateRequest;


class AdminPostsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        // foreach ($posts as $post) {
        //   return dd($post);
        // }
        
        return view('admin.posts.index', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // return dd($categories);
        return view('admin.posts.create', compact('categories') );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {

        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);
            
            $input['photo_id'] = $photo->id;
        }

        $user->post()->create($input);


        return redirect()->route('admin.posts.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        $categories = Category::pluck('id','name');
        // return dd($post);
        return view('admin.posts.edit', compact('post', 'categories') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsEditRequest $request, $id)
    {

        $input = $request->all();

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);
            
            $input['photo_id'] = $photo->id;
        }

        //  return dd($input);
        Auth::user()->post()->findOrFail($id)->update($input);
        
        return redirect()->route('admin.posts.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_msg = "Post has been deleted";

        $post = Post::findOrFail($id);

        if ( $post->photo) {

            $post->photo->delete();
            unlink(public_path() . $post->photo->file );
        }
    
        $post->delete();
        
        Session::flash('deleted_post',  $del_msg);

        return redirect()->route('admin.posts.index');
        
    }

    public function post($slug){

      $post = Post::findBySlugOrFail($slug);

      $comments = $post->comments()->whereIsActive(1)->get();

      return view('post', compact('post', 'comments')  );
    }
}
