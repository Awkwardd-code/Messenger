<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    //
    public $table = "allocations";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'departmen_id',
        'sub_department_id',
        'designation_id'
    ];
    public function departments(){
        return $this->hasMany(Department::class,'id','departmen_id');
    }
    public function sub_departments(){
        return $this->hasMany(SubDepartment::class,'id','sub_department_id');
    }
    public function users(){
        return $this->hasMany(User::class,'id','user_id');
    }
    public function designations(){
        return $this->hasMany(Designation::class,'id','designation_id');
    }
}
