<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
   protected $table = "donhang";
   protected $primaryKey = 'id';
   protected $fillable =['username'];
   public $timestamps = false;
   public function ctdonhang()
    {
        return $this->hasMany('App\Models\ctdonhang', 'iddh', 'id');
    }
    public function User()
    {
    	// return $this->hasMany('App\Models\User', 'username', 'uesrname');
    	return $this->belongsTo('App\Models\User');
    }
}
