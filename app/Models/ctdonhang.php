<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctdonhang extends Model
{
    protected $table = "ctdonhang";
    public $timestamps = false;
    public function donhang()
    {
        return $this->belongsTo('App\Models\donhang');
    }
    public function product()
    {
        return $this->hasOne('App\Models\product', 'id', 'idsp');
    }

}
