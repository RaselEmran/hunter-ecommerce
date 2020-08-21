<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;
class SuperCustomerController extends Controller
{
    public function customer_logout()
    {
    	Session::flush();
    	return Redirect::to('/');
    }
}
