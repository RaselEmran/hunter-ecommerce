<?php

namespace App\Http\Controllers;

use DB;
use Session;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{
    public function logout()
    {
    	Session::flush();
    	return Redirect::to('/Admin');
    }
}
