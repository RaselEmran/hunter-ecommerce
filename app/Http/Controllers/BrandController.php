<?php

namespace App\Http\Controllers;
 
use App\brand; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use DB;

class BrandController extends Controller
{
  public function index()
  {
  	return view('admin.addbrand');
  }
  public function savebrand(Request $request)
  {
    $this->validate($request, [
          //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' =>'required|unique:brands',
            'quantity'=>'required',
           // 'email' => 'required|string|email|max:255|unique:users',
       ]);
    $brand=new brand();
    $brand->name =$request->name;
    $brand->quantity=$request->quantity;
    $brand->save();
    return redirect('/addbrand')->with('msg','Brand Added Successfully');
  }
  public function manegbrand()
  {
    $brand =brand::all();
    return view('admin.manegbrand')->with('brand',$brand);
  }
  public function editbrand($id)
  { $brand=brand::find($id);
    return view('admin.editbrand')->with('brand',$brand);
  }
  public function updatebrand(Request $request)
  {
      $this->validate($request, [
          //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' =>'required',
            'quantity'=>'required',
           // 'email' => 'required|string|email|max:255|unique:users',
       ]);
      $bid =$request->bid;
      $brand=brand::find($bid);
      $brand->name =$request->name;
      $brand->quantity=$request->quantity;
      $brand->save();
      return redirect('/manegbrand')->with('msg','Brand Update Successfully');
  }
  public function deletebrand($id)
  {
    $brand=brand::find($id);
    $brand->delete();
    return redirect('/manegbrand');
  }
}
