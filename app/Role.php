<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    Protected $fillable = ['name'];

    public function users(){
        return $this->belongsToMany(user::class,'role_users')
            // ->withPivot('active')
                    ->withTimestamps();
    }
}
