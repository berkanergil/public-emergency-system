<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public static function policeCount(){
        return Staff::where("department_id","1")->get()->count();
    }

    public static function healthCount(){
        return Staff::where("department_id","2")->get()->count();
    }

    public static function fireCount(){
        return Staff::where("department_id","3")->get()->count();
    }
    
}
