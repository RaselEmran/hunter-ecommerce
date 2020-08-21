<?php

namespace App\Http\Controllers;
use App\category; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class CategoryController extends Controller
{
   public function index() 
   {
   	return view('admin.addcategory');
 
   }
   public function savecategory(Request $request)
   {
 $this->validate($request, [
          //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' =>'required|unique:categories',
           // 'email' => 'required|string|email|max:255|unique:users',
       ]);
 $category =new category();
 $category->name =$request->name;
 $category->save();
 return redirect('/addcategory')->with('msg','Data Added succesfully');

   }
   //showcategory.... 
   public function manegcategory()
   {
   	$cat =category::all();
   	return view('admin.manegcategory')->with('cat',$cat);
   }
   //show edit
   public function editcategory($id)
   {
   	$name =category::find($id);
   	return view('admin.editcategory')->with('name',$name);
   }
   public function updatecat(Request $request)
   {
     $this->validate($request, [
          //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' =>'required',
           // 'email' => 'required|string|email|max:255|unique:users',
       ]);
    $cid =$request->cid;
    $category=category::find($cid);
    $category->name =$request->name;
    $category->save();
    return redirect('/manegcategory');
   }
   public function deletecategory($id)
   {
    $category=category::find($id);
    $category->delete();
    return redirect('/manegcategory');
   }
  
}
