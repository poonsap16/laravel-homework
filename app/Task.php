<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    Protected $fillable = [
        'type',
        'name',
        'detail',
        'completed'
    ];
}
