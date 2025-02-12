<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class thought extends Model
{
    use HasFactory;
    protected $fillable = ['thought','position','user_id'];

    //Relationship to user
    //One has one user
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
