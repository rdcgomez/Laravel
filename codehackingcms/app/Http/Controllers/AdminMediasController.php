<?php

namespace App\Http\Controllers;

use App\Photo;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\MediaRequest;

class AdminMediasController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return view('admin.media.index', compact('photos')  );
    }

    public function create()
    {
        $photos = Photo::all();

        return view('admin.media.create', compact('photos') );
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file' => $name]);
    }

    public function destroy($id)     
    {
       
        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->file);

        $photo->delete();

        return redirect()->route('admin.media.index');

    }
    
    public function deleteMedia(MediaRequest $request)  
    {
      
      $photos = Photo::findOrFail($request->checkBoxArray);

      foreach ($photos as $photo) {
        unlink(public_path() . $photo->file);
        $photo->delete();
      }

      return redirect()->back();
    }
}