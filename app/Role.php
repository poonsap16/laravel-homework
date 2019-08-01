<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    Protected $fillable = ['name'];

    public function users(){
        return $this->belongsToMany(user::class,'role_users','role_id','user_id')
            ->withPivot('active')
            ->withTimestamps();
    }

    public function scopeAdminOrStaff($sub_query){
    		$query->where(function($sub_query){
    			$sub_query->where('role_id',1)->orWhere('role_id',2);
    		});
    }
}
