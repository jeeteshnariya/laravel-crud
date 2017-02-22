<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Post;
use App\Comment;
use Session;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show'] ]);
    }
    
    protected $rules = [
            'name' => ['required', 'min:3'],
            'content' => ['required'],
    ];
	# Get request and view's 
    public function index()  	#List data
    {
        $posts = Post::orderBy('id', 'desc')->paginate(7);                    #Post::all();
        return view('posts.index')->withPosts($posts);
	}

    public function create()  	#Add new form
    {
        return View('posts.create');
    }

    public function show($id) 	#Show post data single page
    {
        $post = Post::findOrFail($id);
        //dd($post);
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
        $this->validate($request, $this->rules);

        $input = $request->all();

        Post::create($input);

        Session::flash('flash_message', 'Post successfully added!');
        
        return redirect()->back()->with('flash_message', 'Message Add Using with Functions! :-)');
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
       
        $post->comments()->delete();
         $post->delete();
        Session::flash('flash_message', 'Post successfully deleted!');

        return redirect()->route('posts.index');
    }

    public function createComment($id)
    {
        $post = Post::findOrFail($id);

        $comment = New Comment();
        $comment->name = Input::get('name');
        $comment->content = nl2br(Input::get('content'));

       // dd($comment);
        $post->comments()->save($comment);

        return \Redirect::route('posts.show',['id'=>$post->id]);
    }

	#<!-- end of all function  -->
}
