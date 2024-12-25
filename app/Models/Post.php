<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $table = "posts";
    public $timestamps = false;
    protected $fillable = [
        'post',
        'user_id',
        'file'
    ];
    public function users(){
        return $this->hasMany(User::class,'id','user_id');
    }
}
