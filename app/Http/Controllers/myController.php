<?php

namespace App\Http\Controllers;
use DB;
use App\product; 
use Illuminate\Http\Request;

class myController extends Controller
{
   public function index()
   {
   	$product = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->orderBy('products.id','desc')
            ->limit(9)
            ->get();
       return view('pages.homcontent')->with('product',$product);
   	//return view('pages.homcontent');
   }
   public function categorybyproduct($id)
   {
$product = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->orderBy('products.id','desc')
            ->where('cat_id',$id)
            ->get();

      return view('pages.categorybyproduct')->with('product',$product);
   }
   public function brandbyproduct($id)
   {
      $brand = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->orderBy('products.id','desc')
            ->where('brand_id',$id)
            ->get();

      return view('pages.brandbyproduct')->with('brand',$brand);
   }
   //product details..............
   public function product_details($id)
   {
      $details = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.name as cat_name', 'brands.name as brand_name')
            ->orderBy('products.id','desc')
            ->where('products.id',$id)
            ->get();
            return view('pages.product_details')->with('details',$details);

   }
}
