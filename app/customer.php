<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
       protected $table='customers';
    public $primaryKey ='id';
    public $timestamps =true;
     protected $fillable=['customer_name','customer_email','password','mobile'];
}
