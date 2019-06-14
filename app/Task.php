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

}