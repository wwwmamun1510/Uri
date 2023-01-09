<?php

namespace App\Http\Controllers;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SingerController extends Controller
{
    public function index()
    {
        $singer = Singer::all();
        return view('admin.Singers.index', compact('singer'));
    }

    public function store(Request $request)
    {
        $singer = new Singer;
        $singer->name = $request->input('name');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/images/', $filename);
            $singer->image = $filename;
        }
        $singer->save();
        return redirect()->back()->with('status','Singer Added Successfully!!!');
    }

    public function edit($id)
    {
        $singer = Singer::find($id);
        return view('admin.Singers.edit', compact('singer'));
    }

    public function update(Request $request, $id)
    {
        $singer = Singer::find($id);
        $singer->name = $request->input('name');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/images/', $filename);
            $singer->image = $filename;
        }
        $singer->update();
        return redirect()->back()->with('status','Singer Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $singer = Singer::find($id);
        $destination = 'public/uploads/images/'.$singer->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $singer->delete();
        return redirect()->back()->with('status','Singer Deleted Successfully!!!');
    }

}