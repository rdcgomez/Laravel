<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StoreUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mypage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
      
        User::create($input);
        
        return redirect()->back();
    }
    

} 

