<?php

namespace App\Models;

use App\Models\GroupEvent;
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

    public function groupEvents(){
        return $this->hasMany(GroupEvent::class,"group_id","group_id");
    }

    public static function currentEvent($id){
        return Event::join("group_events","events.id","=","group_events.event_id")->where("events.event_status_id",2)->where("group_events.group_id",$id)->get()->first();
    }

    public static function groupMembers($id){
        return Staff::join("groups","groups.staff_id","=","staff.id")->where("groups.group_id",$id)->get();
    }
}
