<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  protected $table = "category";
  protected $primaryKey = 'id';
  public $timestamps = false;
  public function product()
  {
  	return $this ->hasMany('App\Models\product','category','id');
  }
}
