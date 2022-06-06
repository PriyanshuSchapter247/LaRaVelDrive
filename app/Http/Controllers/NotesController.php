<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//    public function block(request $id)
//    {
//
//        $notes = Block::with(['category'])->find($id);
//
////        dd($notes);
//        $users = User::find($id);
//        return view('notes.detailnotes', compact('users', 'notes'));
//    }
//
//    public function notes()
//    {
//        return view('notes.viewnotes');
//    }


    public function add()
    {
        $categories = Category::all();
        return view('notes.addnotes', compact('categories'));
    }

    //Image Store Page
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'notes' => 'required|max:2040'
        ]);

        $notes = new Block;
        $user_id = Auth::user()->id;
        $category_name = Category::get('name');
        $notes->user_id = $user_id;
        $notes->name = $request->input('name');
        $notes->notes = $request->input('notes');
        $notes->category_id = $request->input('category_id');
//        $notes->category_name = $category_name;

//dd($notes);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/banner', $filename);
            $notes->image = $filename;

        }
        $notes->save();
//            Mail::raw('you have successful add notes on mini drive', function ($msg) {
//                $msg->to(Auth::user()->email)->subject('Add Notes');
//            });

        return redirect('notes/show')->with('success', 'Notes Added successfully.');

    }

    public function edit($id)
    {
        $notes = Block::with(['categoryName'])->find($id);
        $categories = Category::all();
        return view('notes.notesedit', compact('notes','categories'));
    }


    public function update(Request $request, $id)
    {
//    return $request->all();
        $request->validate([
            'name' => 'required|min:5',
            'notes' => 'required|max:2040'
        ]);

        $notes = Block::find($id);
        $notes->name = $request->input('name');
        $notes->notes = $request->input('notes');
        $notes->category_id = $request->input('category_id');
//    dd($notes);
        $notes->update();


        return redirect('notes/show')->with('success', 'Notes Edit successfully.');
    }

    //Image Show
    public function show()
    {
//        $notes = Block::all();

        $notes = Block::with(['categoryName'])->get();
//        dd($notes);
//        $category = Category::all();
        return view('notes.detailnotes', compact('notes'));
    }


    //Notes View Page
    public function view($id)
    {
//        $notes as $note
        $notes = Block::find($id);
        return view('notes.viewnotes', compact('notes'));
    }


    public function destroy(Block $image, $id)
    {
        $notes = Block::find($id);
//        $notes = Block::all();
        $notes->delete();
        return redirect('/notes/show')->with('danger', 'Data Deleted successfully.');
    }
}
