<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessengerGroup extends Model
{
    //
    public $table = "messenger_groups";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'group_id'
    ];


    public function users(){
        return $this->hasMany(User::class,'id','user_id');
    }
    public function groups(){
        return $this->hasMany(Group::class,'id','group_id');
    }
}
