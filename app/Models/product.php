<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "product";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function comment()
    {
        return $this->hasMany('App\Models\comment', 'product_id', 'id');
    }
    public function ctdonhang()
    {
        return $this->belongsTo('App\Models\ctdonhang');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\category');
    }

}
