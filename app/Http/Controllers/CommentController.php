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
        $bp->blogpost_id = $request['blogpost_id'];
        return ($bp->save() == 1) ?
            redirect('/comments')->with('status_success', 'Darbuotojas sukurtas!') :
            redirect('/comments')->with('status_error', 'Darbuotojas nesukurtas!');
    }


    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect('/comments')->with('status_success', 'Darbuotojas ištrintas!');
    }

    public function update($id, Request $request)
    {



        $this->validate($request, [
            'text' => 'required|unique:comments,text,' . $id . ',id',
        ]);
        $bp = Comment::find($id);
        $bp->text = $request['text'];
        return ($bp->save() !== 1) ?
            redirect('/comments/' . $id)->with('status_success', 'Darbuotojas atnaujintas!') :
            redirect('/comments/' . $id)->with('status_error', 'Darbuotojas nebuvo atnaujintas!');
    }
}
