<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // For Soft Delete

    public function destroy(Image $image, $id): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $image = Image::find($id);
        $image->delete();
        return redirect('show')->with('danger', 'Image Deleted successfully.');
    }

    // Show Delete records

    public function index(Request $request)
    {
        $images['images'] = DB::table('image')->where('created_by', '=', Auth::user()->id)->whereNotNull('deleted_at')->get();

        return view('image.recycle')->with($images);
    }



    // Permanent Delete

    public function delete($id)
    {
        Image::where('id',$id)->forcedelete();

        return redirect('show');
    }

    // Restore

    public function restore($id)
    {
        Image::withTrashed()->find($id)->restore();

        return back();
    }

    // Restore all

    public function restoreAll()
    {
        Image::onlyTrashed()->restore();

        return back();
    }
}
