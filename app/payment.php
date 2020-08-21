<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
   protected $table='payments';
    public $primaryKey ='payment_id';
    public $timestamps =true;
     protected $fillable=['payment_method','payment_status'];
}
