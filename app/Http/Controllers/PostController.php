<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
 	public function getDashboard(){

 		$posts = Post::all();
		return view('dashboard', ['posts' => $posts]);
	}   
 
    public function postCreatePost(Request $request){

    	$this->validate($request, [
    		'post' => 'required|max:1000'
    	]);

    	$post = new Post();
    	$post->body = $request['post'];

    	$message = 'Error, Check again';

    	if($request->user()->posts()->save($post)){
    		$message = 'Posted successfully';
    	}
    	else{
    		$message = 'Error, Check again';	
    	}

    	return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id){
    	$post = Post::find($post_id)->first(); // first() will take the first one that matches with post_id

    	if( Auth::user() != $post->user ){
    		return redirect()->back();
    	}

    	$post->delete();
    	return redirect()->route('dashboard')->with(['message' => 'Deleted']);
    }
}
