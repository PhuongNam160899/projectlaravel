<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = "comment";
    public $timestamps = false;
    // protected $primaryKey = 'username';
    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
}
