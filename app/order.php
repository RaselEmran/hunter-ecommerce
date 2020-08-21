<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
     protected $table='orders';
    public $primaryKey ='order_id';
    public $timestamps =true;
     protected $fillable=['customer_id','shiping_id','	payment_id','order_total','order_status'];
}
