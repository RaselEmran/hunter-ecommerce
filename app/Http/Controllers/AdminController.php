<?php

namespace App\Http\Controllers;
use DB;
use Session;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
  public function index()
  {
  	return view('admin_login');
  }
  public function showdashbord() 
  {
  	return view('admin.dashbord');
  }

  public function dashbord(Request $request)
  {
   $admin_email =$request->admin_email;
   $admin_password =md5($request->admin_password);
   $result =DB::table('users')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();
            if ($result) {
            	Session::put('admin_name',$result->admin_name);
            	Session::put('admin_id',$result->id);
            	return Redirect::to('/dashbord');
            }
            else
            {
            	Session::put('msg','Email and Password doesnt Match');
            	return Redirect::to('/Admin');
            }
  }
}
