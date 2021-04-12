<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BlogPostController extends Controller{
    // array imitates our model / database
    private $blogPosts = [
        ['id' => 1, 'title' => 'Title 1', 'text' => 'Some text 1'],
        ['id' => 2, 'title' => 'Title 2', 'text' => 'Some text 2']
    ];

    public function index(){
        return view('blogposts', ['posts' => \App\Models\Blogpost::all()]);
        //  return view('blogposts', ['posts' => $this->blogPosts]);
    }

    public function show($id){
        foreach($this->blogPosts as $blogPost){
            if($blogPost['id'] == $id){
                return $blogPost;
            }
        }
    }

    public function store(Request $request){
        $bp = new \App\Models\Blogpost();
        $bp->title = $request['title'];
        $bp->text = $request['text'];
        return ($bp->save() == 1) ? "OK" : "NOT OK";
    }

}
