<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];


    public static function groups(){
        return Group::select("group_id")->groupBy("group_id")->get();
    }
}
