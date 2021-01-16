<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  protected $table = "category";
  public function product()
  {
  	return $this ->hasMany('App\product','category','id');
  }
}
