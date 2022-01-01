<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupEvent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function firePoliceCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","1")->where("staff.department_id","1")->get()->count();
    }

    public static function fireHealthCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","1")->where("staff.department_id","2")->get()->count();
    }

    public static function fireFireCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","1")->where("staff.department_id","3")->get()->count();
    }

    public static function crimePoliceCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","2")->where("staff.department_id","1")->get()->count();
    }

    public static function crimeHealthCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","2")->where("staff.department_id","2")->get()->count();
    }

    public static function crimeFireCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","2")->where("staff.department_id","3")->get()->count();
    }

    public static function naturalEventPoliceCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","3")->where("staff.department_id","1")->get()->count();
    }

    public static function naturalEventHealthCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","3")->where("staff.department_id","2")->get()->count();
    }

    public static function naturalEventFireCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","3")->where("staff.department_id","3")->get()->count();
    }

    public static function trafficPoliceCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","4")->where("staff.department_id","1")->get()->count();
    }

    public static function trafficHealthCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","4")->where("staff.department_id","2")->get()->count();
    }

    public static function trafficFireCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","4")->where("staff.department_id","3")->get()->count();
    }

    public static function healthPoliceCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","5")->where("staff.department_id","1")->get()->count();
    }

    public static function healthHealthCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","5")->where("staff.department_id","2")->get()->count();
    }

    public static function healthFireCount()
    {
        return GroupEvent::join("groups", "groups.id", "=", "group_events.group_id")->join("staff", "staff.id", "=", "groups.staff_id")->join("events", "events.id", "=", "group_events.event_id")->where("events.event_type_id","5")->where("staff.department_id","3")->get()->count();
    }

    public function group($id){
        return Group::where("group_id",$id)->get(); 
    }

    public function assignerStaff(){
        return $this->belongsTo(Staff::class,"staff_id","assigner_staff_id");
    }



    
}
