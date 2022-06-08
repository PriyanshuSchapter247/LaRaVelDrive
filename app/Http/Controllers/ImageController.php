<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Share;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ShareImageJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;


class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Image Page

    public function index()
    {


        $count = Image::where('created_by', auth()->user()->id)->count();
        $user = User::with(['userPlan'])->where('id', auth()->user()->id)->first();

        if ($count < $user->userPlan->limit) {
            return view('image.imageupload');
        } else
            return redirect('show')->with('danger', 'you have reached the limit');
    }

    public function create()
    {
        //
    }

    //Image Store Page
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = new Image;
        $user_id = Auth::user()->id;
        $image->created_by = $user_id;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/images', $filename);
            $image->image = $filename;
            $image->save();

            Mail::raw('you have successful add image on mini drive', function ($msg) {
                $msg->to(Auth::user()->email)->subject('Add Image');
            });

            return redirect('show')->with('success', 'Image Added successfully.');
        }
    }

    public function edit($id)
    {
        //
    }

    //Image Show
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

    //Image View Page
    public function image_view($id)
        //\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
//         dd($share);
        $image = Image::find($id);
        if($image){
            $share = Share::where('send_image',$id)->where('send_to',auth()->id())->first();
//        dd($share);
            return view('image.detail', compact(['image', 'share']));
        }
        return view('image.error');

    }


}







