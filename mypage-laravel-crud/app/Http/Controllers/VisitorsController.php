<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    public function index()
    {
      $users = User::all();

      return view('mypagedatabase', compact('users') );
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);
      return view('mypageupdate', compact('user') );
    }
    
    public function update(Request $request, $id)  
    {
      $user = User::findOrFail($id);

      $input = $request->all();
      
      $user->update($input);

      return redirect()->route('show.all');
    }

    public function destroy($id)
    {
      User::findOrFail($id)->delete();

      return redirect()->back();
    }
}
