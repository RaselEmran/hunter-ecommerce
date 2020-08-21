<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\slider;
class SliderController extends Controller
{
public function index()
{
	return view('admin.addslider');
}
public function addslider(Request $request)
{
	$this->validate($request, [
    		'title'=>'required',
    		'sub_title'=>'required',
    		'description' =>'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      
       ]);

    	
    	 $image =$request->file('image');
    	     if ($image) {
    
      $imagename =uniqid().time().$image->getClientOriginalName();
     $uploadpath ='slider/';
      $image->move($uploadpath, $imagename);
      $imageurl =$uploadpath.$imagename;
     }
     $data =array();
        $data["title"] =$request->title;
    	 $data["sub_title"] = $request->sub_title;
    	 $data["description"] =$request->description;
    	 $data["image"] =$imageurl;

    	  DB::table('sliders')->insert($data);
    	  return redirect('/addslider')->with('msg','Data Added succesfully');

}
public function manegslider()
{
	$slider = DB::table('sliders')
	               ->get();
	 return view('admin.manegslider')->with('slider',$slider);              
}
public function editslider($id)
{
 $slider =slider::find($id);
 return view('admin.editslider')->with('slider',$slider);

}
public function updateslider(Request $request)
{
	$this->validate($request, [
    		'title'=>'required',
    		'sub_title'=>'required',
    		'description' =>'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      
       ]);
        $id =$request->sid;
    	$slider =slider::find($id);
    	 $image =$request->file('image');
    	     if ($image) {
       unlink($slider->image);
      $imagename =uniqid().time().$image->getClientOriginalName();
      $uploadpath ='slider/';
      $image->move($uploadpath, $imagename);
     $imageurl =$uploadpath.$imagename;
     }
      $data =array();
     $data["title"] =$request->title;
    	 $data["sub_title"] = $request->sub_title;
    	 $data["description"] =$request->description;
    	 $data["image"] =$imageurl;

    DB::table('sliders')
    	 ->where('id',$id)
    	  ->update($data);
      return redirect('/manegslider');

}
public function deleteslider($id)
{
	     $slider =slider::find($id);
       if ($slider->image) {
      
       unlink($slider->image);
    }
      $slider->delete();
      return redirect('/manegslider');
    }

}
