<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeStamp extends Model
{
    protected $fillable = [
            'id_card',
            'sap_id',
            'full_name',
            'date',
            'time',
            'reader',
            'come_in',
            'door'
    ];
}
