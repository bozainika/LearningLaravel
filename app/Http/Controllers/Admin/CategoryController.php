<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\categoryFormRequest;
use App\Http\Requests\categoryUpdateRequest;

class CategoryController extends Controller
{
    public function index(){
    	$categories=Category::all();
    	return view('backend.categories.index',compact('categories'));
    }
    public function create(){
    	return view('backend.categories.create');
    }
    public function store(categoryFormRequest $request){
    	$category=new Category(
    		array('name'=>$request->get('name'))
    	);
    	$category->save();
    	return redirect('admin/categories/create')->with('status','You created a category');
    }
    public function destroy($id){
    	$category=Category::whereId($id)->firstOrFail();
    	$category->delete();
    	return redirect(action('Admin\CategoryController@index'))->with('status','You deleted the category');
    }
}
