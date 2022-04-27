<?php

namespace App\Http\Controllers;

use App\Jobs\ShareImageJob;
use App\Models\Image;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShareController extends Controller
{

    public function shareview(Image $image, $id)
    {
        $image = Image::with(['user'])->find($id);

        $users = User::all();
        return view('image.share', compact(['image', 'users']));
    }

    public function share(Request $request)
    {
        $image = new Share;
        $user_email = Auth::user()->email;
        // dd()
        $image->send_from = $user_email;
        $image->send_to = $request->get('send_to');
        $image->send_image = $request->get('send_image');
        $image->url = $request->get('url');
        $image->status = '1';
        // dd($image);
        //    $data['send_to']=
        $image->save();
        // send email here
        $data['send_from'] = $image->send_from;
        $data['send_to'] = $image->send_to;
        $data['send_image'] = $image->send_image;
        $data['send_url'] = $image->url;
        dispatch(new ShareImageJob($data));
        return redirect('show')->with('success', 'Image Shared successfully to' . $data['send_to']);
    }


    public function sharelist()
    {
        $images['images'] = Share::where('send_to', '=', Auth::user()->email)->where('status', '=', '1')->get();
        // dd($images['images'];
        return view('image.sharelist')->with($images);
    }

    public function request(Share $image, $id)
    {

        $data = Share::with(['user'])->find($id);

        // dd($data);

        $image = new Share;
        $send_to = Auth::user()->email;
        $image->send_from = $data->send_from;
        // dd($image);
        $image->send_to = $send_to;
        $image->send_image = $data->send_image;
        $image->url = $data->url;
        $image->status = '0';
        // dd($image);
        $image->save();


        return redirect('/home')->with('success', 'Request Send');
    }


    public function requestlist()
    {
        $images['images'] = Share::where('send_from', '=', Auth::user()->email)->where('status', '=', '0')->get();
        $count = Share::where('send_from', '=', Auth::user()->email)->where('status', '=', '0')->count();
        // dd($count);
        // dd($images['images'] , Auth::user()->id);
        // $images=Share::all();
        return view('image.requestlist')->with($images, $count);
    }

    public function changeStatus(image $image, $id)
    {
        $images = DB::table('Share')
            ->where('id', $id)
            ->update(['status' => '1']);

        return redirect('/requestlist')->with('success', 'Request Accepted successfully');
    }

}
