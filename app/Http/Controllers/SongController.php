<?php

namespace App\Http\Controllers;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SongController extends Controller
{
    public function index()
    {
        $song = Song::all();
        return view('admin.Songs.index', compact('song'));
    }

    public function store(Request $request)
    {
        $song = new Song;
        $song->title = $request->input('title');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/images/', $filename);
            $song->image = $filename;
        }
        $song->save();
        return redirect()->back()->with('status','Song Added Successfully!!!');
    }

    public function edit($id)
    {
        $song = Song::find($id);
        return view('admin.Songs.edit', compact('song'));
    }

    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        $song->title = $request->input('title');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/images/', $filename);
            $song->image = $filename;
        }
        $song->update();
        return redirect()->back()->with('status','Song Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $song = Song::find($id);
        $destination = 'public/uploads/images/'.$song->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $song->delete();
        return redirect()->back()->with('status','Song Deleted Successfully!!!');
    }

}