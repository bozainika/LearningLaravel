<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostFormRequest;
use App\Http\Requests\PostFormRequest;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth; 


class PostsController extends Controller
{
	public function index(){
		$posts=Post::all();
		return view('backend.posts.index', compact('posts'));

	}
    public function create(){
    	$categories=Category::all();
    	return view('backend.posts.create',compact('categories'));
    }
    public function store(postFormRequest $request){
    	$slug= uniqid();
    	$user=Auth::user();
    	$post= new Post(
    		array('title'=>$request->get('title'),'content'=>$request->get('content'),'slug'=>$slug, 'user_id'=>$user->id)
    	);
    	$post->save();
		$post->saveCategory($request->get('category'));
    	return redirect('admin/posts/create')->with('status','You created a post successfully');
    }
    public function edit($id){
    	$post=Post::whereId($id)->firstOrFail();
    	$categories=Category::all();
    	$selectedCategory=$post->category->lists('id')->toArray();
    	return view('backend.posts.edit',compact('post','categories','selectedCategory'));
    }
    public function update(editPostFormRequest $request, $id){
    	$post=Post::whereId($id)->firstOrFail();
    	$post->title=$request->get('title');
    	$post->content=$request->get('content');
    	$post->save();
    	$post->saveCategory($request->get('category'));
   		return redirect(action('Admin\PostsController@edit',$post->id))->with('status','You edited the post successfully!');
    }
    public function destroy($id){
    	$post=Post::whereId($id)->firstOrFail();
    	$post->delete();
    	return redirect(action('Admin\PostsController@index'))->with('status','You deleted the post');
    }
}
