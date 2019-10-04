<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Main extends Model
{
    //

    use Notifiable;

    protected $fillable = [
        'taskName', 'status',
    ];

    protected $casts = [

    ];
}
