<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use Session;

class PostsController extends Controller
{

	# Get request and view's 
    public function index()  	#List data
    {
        $posts = Post::all();
        return view('posts.index')->withPosts($posts);
	}

    public function create()  	#Add new form
    {
        return View('posts.create');
    }

    public function show($id) 	#Show post data single page
    {
        $post = Post::findOrFail($id);
        return view('posts.show')->withPost($post);
    }

    public function edit($id) 	#Edit post data edit form
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->withPost($post);
    }

    #Post,put and delete request 

 	public function store(Request $request)  		#Recive data from sent by create()
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required'
        ]);

        $input = $request->all();

        Post::create($input);

        Session::flash('flash_message', 'Task successfully added!');
        
        return redirect()->back();
    }

    public function update(Request $request, $id)  	#Recive data from sent by edit()
    {
        $post = Post::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'content' => 'required'
        ]);

        $input = $request->all();

        $post->fill($input)->save();

        Session::flash('flash_message', 'Post successfully Updated!');

        return redirect()->back();
    }

    public function destroy($id)  					#Delete post data 
    {
    
        $post = Post::findOrFail($id);
        $post->delete();

        Session::flash('flash_message', 'Post successfully deleted!');

        return redirect()->route('posts.index');
    }

	#<!-- end of all function  -->
}
