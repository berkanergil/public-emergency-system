<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public static function countToday(){
        return Event::whereDate("created_at","=",Carbon::today())->get()->count();
    }

    public static function handledCountToday(){
        return Event::where("event_status_id","1")->whereDate("created_at","=",Carbon::today())->get()->count();
    }

    public static function beingHandledCountToday(){
        return Event::where("event_status_id","2")->whereDate("created_at","=",Carbon::today())->get()->count();
    }

    public static function notHandledCountToday(){
        return Event::where("event_status_id","3")->whereDate("created_at","=",Carbon::today())->get()->count();
    }

    public static function count(){
        return Event::all()->count();
    }

    public static function handledCount(){
        return Event::where("event_status_id","1")->get()->count();
    }

    public static function notHandledCount(){
        return Event::where("event_status_id","3")->get()->count();
    }

    public static function fireCount(){
        return Event::where("event_type_id","1")->get()->count();
    }

    public static function crimeCount(){
        return Event::where("event_type_id","2")->get()->count();
    }

    public static function naturalEventCount(){
        return Event::where("event_type_id","3")->get()->count();
    }

    public static function trafficCount(){
        return Event::where("event_type_id","4")->get()->count();
    }

    public static function healthCount(){
        return Event::where("event_type_id","5")->get()->count();
    }

    public static function currentEvents(){
        return Event::whereIn("event_status_id",[2,3])->orderBy("id","desc")->get();
    }

    public static function pastEvents(){
        return Event::where("event_status_id","1")->orderBy("id","desc")->get();
    } 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function eventStatus(){
        return $this->belongsTo(EventStatus::class);
    }

    public function eventType(){
        return $this->belongsTo(EventType::class);
    }

    public function group(){
        return $this->hasOne(GroupEvent::class);
    }   
    
    public function status(){
        return $this->belongsTo(User::class);
    }
    

}
