<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
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
    
    public static function authorities(){
        return Staff::where("staff_role_id","1")->get();
    }

    public static function agents(){
        return Staff::where("staff_role_id","2")->orderBy("department_id")->get();
    }

    public static function admins(){
        return Staff::where("staff_role_id","3")->get();
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function availableAgents(){
        $staff_id=Group::all()->pluck("staff_id");
        return Staff::where("staff_role_id","2")->whereNotIn("id",$staff_id)->orderBy("department_id")->get();
    }

    public function group(){
        return $this->hasOne(Group::class);
    }

    
}
