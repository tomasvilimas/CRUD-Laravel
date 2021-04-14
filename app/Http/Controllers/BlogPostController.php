<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Blogpost;


class BlogPostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('blogposts', ['posts' =>Blogpost::all()]);
    }

    public function show($id)
    {
        return view('blogpost', ['post' => Blogpost::find($id)]);

        
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogposts',
            'text' => 'required',
        ]);

        $bp = new Blogpost();
        $bp->title = $request['title'];
        $bp->text = $request['text'];
        // if ($bp->title == NULL or $bp->text == NULL)
        //     return redirect('/posts')->with('status_error', 'Post was not created!');
        return ($bp->save() == 1) ?
            redirect('/posts')->with('status_success', 'Post created!') :
            redirect('/posts')->with('status_error', 'Post was not created!');
    }


    public function destroy($id)
    {
        Blogpost::destroy($id);
        return redirect('/posts')->with('status_success', 'Post deleted!');
    }

    public function update($id, Request $request){
        // [Dėmesio] validacijoje unique turi būti teisingas lentelės pavadinimas!
                $this->validate($request, [
                    'title' => 'required|unique:blogposts,title,'.$id.',id',
                    'text' => 'required',
                ]); 
                $bp = Blogpost::find($id);
                $bp->title = $request['title'];
                $bp->text = $request['text'];
                return ($bp->save() !== 1) ? 
                    redirect('/posts/'.$id)->with('status_success', 'Post updated!') : 
                    redirect('/posts/'.$id)->with('status_error', 'Post was not updated!');
            }

            public function storePostComment($id, Request $request){
                $this->validate($request, ['text' => 'required']);
                $bp = \App\Models\Blogpost::find($id);
                $cm = new \App\Models\Comment();
                $cm->text = $request['text'];
                $bp->comments()->save($cm); // priskiriame naują komentarą blogpostui
                return redirect()->back()->with('status_success', 'Comment added!');
            }
        
        
        
}
