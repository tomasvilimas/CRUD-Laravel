<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Comment;
use Illuminate\Support\Facades\Gate;


class CommentController extends Controller
{




    public function index()
    {
        return view('comments', ['comments' => Comment::all()]);
    }

    public function show($id)
    {
        return view('comment', ['comment' => Comment::find($id)]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|unique:comments',

        ]);

        $bp = new Comment();
        $bp->text = $request['text'];
        $bp->blogpost_id = auth()->user()->id; // Trying to get property 'id' of non-object
       

        // if ($bp->title == NULL or $bp->text == NULL)
        //     return redirect('/posts')->with('status_error', 'Post was not created!');
        return ($bp->save() == 1) ?
            redirect('/comments')->with('status_success', 'Projektas sukurtas!') :
            redirect('/comments')->with('status_error', 'Projektas nesukurtas!');
    }


    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect('/comments')->with('status_success', 'Darbuotojas ištrintas!');
    }
}
