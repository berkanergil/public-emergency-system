<?php

namespace App\Models;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Staff;
use App\Models\Document;
use App\Models\EventType;
use App\Models\GroupEvent;
use App\Models\EventStatus;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BroadcastsEvents;

    protected $guarded = [];

    public static function countToday()
    {
        return Event::whereDate("created_at", "=", Carbon::today())->get()->count();
    }

    public static function handledCountToday()
    {
        return Event::where("event_status_id", "1")->whereDate("created_at", "=", Carbon::today())->get()->count();
    }

    public static function beingHandledCountToday()
    {
        return Event::where("event_status_id", "2")->whereDate("created_at", "=", Carbon::today())->get()->count();
    }

    public static function notHandledCountToday()
    {
        return Event::where("event_status_id", "3")->whereDate("created_at", "=", Carbon::today())->get()->count();
    }

    public static function count()
    {
        return Event::all()->count();
    }

    public static function handledCount()
    {
        return Event::where("event_status_id", "1")->get()->count();
    }

    public static function notHandledCount()
    {
        return Event::where("event_status_id", "3")->get()->count();
    }

    public static function fireCount()
    {
        return Event::where("event_type_id", "1")->get()->count();
    }

    public static function crimeCount()
    {
        return Event::where("event_type_id", "2")->get()->count();
    }

    public static function naturalEventCount()
    {
        return Event::where("event_type_id", "3")->get()->count();
    }

    public static function trafficCount()
    {
        return Event::where("event_type_id", "4")->get()->count();
    }

    public static function healthCount()
    {
        return Event::where("event_type_id", "5")->get()->count();
    }

    public static function currentEvents()
    {
        return Event::whereIn("event_status_id", [2, 3])->orderBy("id", "desc")->get();
    }

    public function mergedEvents()
    {
        return $this->belongsTo(MergedEvents::class);
    }

    public static function pastEvents()
    {
        return Event::where("event_status_id", "1")->orderBy("id", "desc")->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function eventStatus()
    {
        return $this->belongsTo(EventStatus::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function groupEvent()
    {
        return $this->hasOne(GroupEvent::class)->latest();
    }

    public function status()
    {
        return $this->belongsTo(EventStatus::class, "event_status_id");
    }

    public function staffEvents()
    {
        return $this->hasMany(StaffEvent::class);
    }
    public function eventNotes()
    {
        return $this->hasMany(Notes::class);
    }
    public function getNotes($event)
    {
        $notes = Notes::get()->where('event_id', '=', '$event->id')->all();
        return $notes;
    }
    public static function history($id)
    {
        try {
            $array = array();
            $note = Notes::find($id);
            $event = Event::find($id);
            $assignerStaff = Staff::find($event->groupEvent->assigner_staff_id);
            $staffEvent = EventStatus::find($event->groupEvent->assigner_staff_id);
            $array["create"] = [
                "creator_name" => isset($event->staff->id) ? $event->staff->name . ' ' . $event->staff->surname : $event->user->name . ' ' . $event->user->surname,
                "creator_type" => isset($event->staff->id) ? "staff" : "user",
                "creator_id" => isset($event->staff->id) ? $event->staff->id : $event->user->id,
                "created_at" => $event->created_at
            ];
            $array["group"] = [
                "group_id" => isset($event->groupEvent) ? $event->groupEvent->group_id : null,
                "assigner_staff_id" => isset($event->groupEvent) ? $event->groupEvent->assigner_staff_id : null,
                "assigner_staff_name" => isset($assignerStaff) ? $assignerStaff->name . " " . $assignerStaff->surname : null,
                "created_at" => isset($event->groupEvent) ? $event->groupEvent->created_at : null,
            ];

            foreach ($event->staffEvents as $staffEvent) {
                $array["mark"][] = [
                    "event_status_name" => $staffEvent->eventStatus->title,
                    "staff_name" => $staffEvent->staff->name . " " . $staffEvent->staff->surname,
                    "staff_id" => $staffEvent->staff_id,
                    "created_at" => $staffEvent->created_at,
                ];
            }

            return $array;
        } catch (Exception $e) {
        }
    }



    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => [new Channel('new-event')],
            'updated' => [new Channel('updated-event')],
            default => []
        };
    }

    public function broadcastWith($event)
    {
        return match ($event) {
            'created' => ["model" => $this],
            'updated' => ["model" => $this],
        };
    }

    public function broadcastAs($event)
    {
        return match ($event) {
            'created' => 'event.created',
            'updated' => 'event.updated',
        };
    }
}
