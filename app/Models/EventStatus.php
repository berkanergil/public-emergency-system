<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public static function eventStatuses(){
        return EventStatus::all();
    }
}
