<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    Protected $fillable = ['user_id', 'role_id','active'];
}
