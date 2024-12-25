<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public $table = "groups";
    public $timestamps = false;
    protected $fillable = [
        'name',
        'dept_id'
    ];
    public function departments(){
        return $this->hasMany(Department::class,'id','dept_id');
    }
}
