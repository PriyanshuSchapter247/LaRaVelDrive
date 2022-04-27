<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Share;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ShareImageJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('image.imageupload');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
//        dd($request);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = new Image;
        $user_id = Auth::user()->id;
        // dd($user_id);
        $image->created_by = $user_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/images/', $filename);
            $image->image = $filename;
        }
        $image->save();
        Mail::raw('you have successful add image on mini drive',function($msg){
            $msg->to(Auth::user()->email)->subject('Add Image');
        });
        return redirect('show')->with('success', 'Image Added successfully.');
    }


    public function edit($id)
    {
        //
    }

    public function show()
    {
        $images['images'] = Image::where('created_by', '=', Auth::user()->id)->get();
        // dd($images['image']);
        return view('image.show')->with($images);
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Image $image, $id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect('show')->with('danger', 'Image Deleted successfully.');
    }


    public function view(Image $image, Share $share, $id)
    {
//         dd($share);
        $image = Image::find($id);
        $share = Share::find($id);
//        dd($share);
        return view('image.detail', compact(['image', 'share']));
    }

}







