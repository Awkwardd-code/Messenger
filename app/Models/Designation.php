<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    public $table = "designations";
    public $timestamps = false;
    protected $fillable = [
        'designation'
    ];
}
