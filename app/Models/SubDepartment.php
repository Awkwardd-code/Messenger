<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    //
    public $table = "sub_departments";
    public $timestamps = false;
    protected $fillable = [
        'sub_dept_name',
        'dept_id'
    ];
    public function departments(){
        return $this->hasMany(Department::class,'id','dept_id');
    }
}
