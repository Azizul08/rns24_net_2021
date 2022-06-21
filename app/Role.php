<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //relation with user table
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
