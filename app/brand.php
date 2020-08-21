<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{  
	protected $table='brands';
    public $primaryKey ='id';
    public $timestamps =true;
    protected $fillable=['name','quantity'];
}
