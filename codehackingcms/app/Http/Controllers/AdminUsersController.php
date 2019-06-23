<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Photo;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        if(trim($request->password) == ''){

            $input = $request->except('password');
        } else{

            $input = $request->all();
            $input['password'] = bcrypt($request->password);            
        }

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);
            
            $input['photo_id'] = $photo->id;
        }
        
        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect()->route('admin.users.index');

        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('/admin/users/edit', compact('user', 'roles'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //

        $user = User::findOrFail($id);
        // $photo = Photo::findOrFail($id);

        if(trim($request->password) == ''){

            $input = $request->except('password');
        } else{

            $input = $request->all();
            $input['password'] = bcrypt($request->password);            
        }

        if($file = $request->file('photo_id') ){
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            // $photo->delete(public_path('images/'. $user->photo->file));

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        
        
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_msg = 'The user has been deleted';

        $user = User::findOrFail($id);

        unlink(public_path() . $user->photo->file);
        
        $user->photo->delete();

        $user->delete();
        Session::flash('deleted_info',  $del_msg);

        return redirect('admin/users');
    }

    
    


}
