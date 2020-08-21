<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
        protected $table='sliders';
    public $primaryKey ='id';
    public $timestamps =true;
    protected $fillable=['title','sub_title','description','image'];
}
