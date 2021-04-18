<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Blogpost;
use Illuminate\Support\Facades\Gate;


class BlogPostController extends Controller
{
    public function index()
    {
        return view('blogposts', ['posts' => Blogpost::all()]);
    }

    public function show($id)
    {
        return view('blogpost', ['post' => Blogpost::find($id)]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogposts',

        ]);

        $bp = new Blogpost();
        $bp->title = $request['title'];
        $bp->user_id = auth()->user()->id;
        return ($bp->save() == 1) ?
            redirect('/posts')->with('status_success', 'Projektas sukurtas!') :
            redirect('/posts')->with('status_error', 'Projektas nesukurtas!');
    }


    public function destroy($id)
    {

        if (Gate::denies('delete-post', Blogpost::find($id)))
            return redirect()->back()->with('status_error', 'Negalite ištrinti šio projekto!');

        Blogpost::destroy($id);
        return redirect('/posts')->with('status_success', 'Projektas ištrintas!');
    }

    public function update($id, Request $request)
    {
        if (Gate::denies('update-post', Blogpost::find($id)))
            return redirect()->back()->with('status_error', 'Negalite atnaujinti šio projekto!');

        $this->validate($request, [
            'title' => 'required|unique:blogposts,title,' . $id . ',id',

        ]);
        $bp = Blogpost::find($id);
        $bp->title = $request['title'];

        return ($bp->save() !== 1) ?
            redirect('/posts/' . $id)->with('status_success', 'Projektas atnaujintas!') :
            redirect('/posts/' . $id)->with('status_error', 'Projektas nebuvo atnaujintas!');
    }

    public function storePostComment($id, Request $request)
    {
        $this->validate($request, ['text' => 'required']);
        $bp = \App\Models\Blogpost::find($id);
        $cm = new \App\Models\Comment();
        $cm->text = $request['text'];
        $bp->comments()->save($cm); 
        return redirect()->back()->with('status_success', 'Darbuotojas pridėtas!');
    }
}
