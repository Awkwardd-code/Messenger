<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public $table = "messages";
    public $timestamps = false;


    protected $fillable = [
        'user_id',
        'message',
        'created_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users(){
        return $this->hasMany(User::class,'id','user_id');
    }
}
