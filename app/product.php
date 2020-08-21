<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
     protected $table='products';
    public $primaryKey ='id';
    public $timestamps =true;
     protected $fillable=['cat_id','brand_id','product_name','description','product_image','product_size','product_color','product_price','status'];
}
