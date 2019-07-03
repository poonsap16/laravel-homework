<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    Protected $fillable = [
        'type_id',
        'name',
        'detail',
        'user_id',
        'completed'
    ];

    public function getTypeName(){
        switch($this->type){
            case 1:
                return "Hardware";
                break;
            case 2:
                return "Software";
                break;
            case 3:
                return "Network";
                break;
            case 4:
                return "Virus";
                break;
            case 5:
                return "Consult";
                break;
            default:
                return "Unknow";
                break;
        }

    }

    public function type(){
        return $this->belongsTo(Type::class,'type_id');

    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');

    }

}