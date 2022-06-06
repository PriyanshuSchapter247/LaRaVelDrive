<?php

namespace App\Http\Controllers;

use App\Jobs\ShareImageJob;
use App\Models\Image;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Image Share View Page
    public function shareview(Image $image, $id)
    {

        $image = Image::with(['user'])->find($id);
        $users = User::all();
        return view('image.share', compact(['image', 'users']));
    }

    //  For Share
    public function share(Request $request)
    {

        $image = new Share;
        $user_id = Auth::user()->id;
//         dd($image);
        $image->send_from = $user_id;
        $image->send_to = $request->get('send_to');
        $image->send_image = $request->get('send_image');
        $image->url = $request->get('url');
        $image->status = '1';


        $image->save();
        // send email here
//        $data['send_from'] = $image->send_from;
//        $data['send_to'] = $image->send_to;
//        $data['send_image'] = $image->send_image;
//        $data['send_url'] = $image->url;
//        dispatch(new ShareImageJob($data));
        return redirect('show')->with('success', 'Image Shared successfully to ');
    }

    // For Share Record View
    public function sharelist()
    {
        $images['images'] = Share::where('send_to', '=', Auth::user()->id)->where('status', '=', '1')->get();
        // dd($images['images'];
        return view('image.sharelist')->with($images);
    }

    //Share Request Page
    public function request(Share $image, $id)
    {
        $data = Image::with(['user'])->find($id);

//         dd($data);
//
        $image = new Share;
        $send_to = Auth::user()->id;
        $image->send_from = $data->created_by;
//         dd($image->send_from);
        $image->send_to = $send_to;
        $image->send_image = $data->image;
        $image->url = $data->url;
        $image->status = '0';
        // dd($image);
        $image->save();
//        Mail::raw(' user is send request to access the image',function($msg){
//            $msg->to($image->send_to)->subject('Request');
//        });

        return redirect('/home')->with('success', 'Request Send');
    }

    //Share Request
    public function requestlist()
    {
        $images['images'] = Share::where('send_from', '=', Auth::user()->id)->where('status', '=', '0')->get();
//        $count = Share::where('send_from', '=', Auth::user()->id)->where('status', '=', '0')->count();
        // dd($count);
//         dd($images['images']);
        // $images=Share::all();
        return view('image.requestlist')->with($images);
    }

    //For Share Status
    public function changeStatus(image $image, $id)
    {
        $images = DB::table('Share')
            ->where('id', $id)
            ->update(['status' => '1']);

        return redirect('/requestlist')->with('success', 'Request Accepted successfully');
    }

}
