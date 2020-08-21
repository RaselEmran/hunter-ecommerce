<?php

namespace App\Http\Controllers;

use App\product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ProductController extends Controller
{
    public function index()
    {
    	return view('admin.addproduct');
    }
    public function addproduct(Request $request)
    {
    	$this->validate($request, [
    		'cat_id'=>'required',
    		'brand_id'=>'required',
    		'product_name' =>'required',
          'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'product_size' =>'required',
          'product_color' =>'required',
          'status' =>'required',

            
            
       ]);
    	$product =new product();
    	
    	 $image =$request->file('product_image');
    	     if ($image) {
    
      $imagename =uniqid().time().$image->getClientOriginalName();
     $uploadpath ='image/';
      $image->move($uploadpath, $imagename);
      $imageurl =$uploadpath.$imagename;
     }
     $data =array();
        $data["cat_id"] =$request->cat_id;
    	 $data["brand_id"] = $request->brand_id;
    	 $data["product_name"] =$request->product_name;
    	 $data["description"] =$request->description;
    	 $data["product_image"] =$imageurl;
    	 $data["product_size"] =$request->product_size;
    	 $data["product_color"] =$request->product_color;
       $data["product_price"] =$request->product_price;


    	 $data["status"] =$request->status;
    	  DB::table('products')->insert($data);
    	  return redirect('/addproduct')->with('msg','Data Added succesfully');

    }
    public function manegproduct()
    {

      $product = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->orderBy('products.id','desc')
            ->get();
       return view('admin.manegproduct')->with('product',$product);
    }
    public function editproduct($id)
    {
  $product = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->where('products.id', '=' ,$id)
            ->first();
            return view('admin.editproduct')->with('product',$product);
    }
    public function updateproduct(Request $request)
    {
    $this->validate($request, [
        'cat_id'=>'required',
        'brand_id'=>'required',
        'product_name' =>'required',
          'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'product_size' =>'required',
          'product_color' =>'required',
      
       ]);
    $product =new product();
$id =$request->pid;
    $product =product::find($id);

     $image =$request->file('product_image');

      if ($image) {
     unlink($product->product_image);
      $imagename =uniqid().time().$image->getClientOriginalName();
     $uploadpath ='image/';
      $image->move($uploadpath, $imagename);
      $imageurl =$uploadpath.$imagename;
     }
     else{
      $product->product_image;
     }

     $data =array();
        $data["cat_id"] =$request->cat_id;
       $data["brand_id"] = $request->brand_id;
       $data["product_name"] =$request->product_name;
       $data["description"] =$request->description;
       $data["product_image"] =$imageurl;
       $data["product_size"] =$request->product_size;
       $data["product_color"] =$request->product_color;
       $data["product_price"] =$request->product_price;

        DB::table('products')
        ->where('id', '=' ,$id)
        ->update($data);
         return redirect('/manegproduct');

       

    }
    public function deleteproduct($id)
    {
       $product =product::find($id);
       if ($product->product_image) {
      
       unlink($product->product_image);
    }
      $product->delete();
      return redirect('/manegproduct');
    }
} 
