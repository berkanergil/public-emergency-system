<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Staff;
use App\Models\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(Event::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        return response(Event::create($request->all()));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request = $request->except("group_id");
        return response(Event::find($id)->update($request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return response(Event::destroy($id));
    }

    public function eventDetail($id)
    {
        $staff = Staff::find($id);
        $eventDetail = $staff->group->currentEvent($staff->group->group_id);
        if (isset($eventDetail->user_id)) {
            $eventDetail->creator = User::find($eventDetail->user_id);
        } elseif (isset($eventDetail->staff_id)) {
            $eventDetail->creator = Staff::find($eventDetail->staff_id);
        }
        $eventDetail->groupMembers = $staff->group->groupMembers($staff->group->group_id);
        $eventDetail->event_type_title = EventType::find($eventDetail->event_type_id)->title;
        return response($eventDetail);
    }

    public function groupMembers($id)
    {
        $staff = Staff::find($id);
        $groupMembers = $staff->group->groupMembers($staff->group->group_id);
        return response($groupMembers);
    }

    public function reportData()
    {
        $locale = App::currentLocale();
        Log::info($locale);
        $query = Event::whereIn("event_status_id", [2, 3])->orderBy("id", "desc")->get();
        $events = [];
        foreach ($query as $event) {
            if ($event->user) {
                array_push($events, [
                    'id' => $event->id,
                    'type' => $locale == 'en' ? Str::title($event->eventType->title) : Str::title($event->eventType->tr),
                    'user' => Str::title($event->user->name . ' ' . $event->user->surname),
                    'staff' => '',
                    'status' => [
                        'id' => $event->event_status_id,
                        'locale' => $locale
                    ],
                    'location' => [
                        'lat' => $event->lat,
                        'lon' => $event->lon
                    ],
                    'date' => substr($event->created_at, 0, 10) . ' ' . substr($event->created_at, 11, 19)
                ]);
            } else if ($event->staff) {
                array_push($events, [
                    'id' => $event->id,
                    'type' => $locale == 'en' ? Str::title($event->eventType->title) : Str::title($event->eventType->tr),
                    'user' => '',
                    'staff' => Str::title($event->staff->name . ' ' . $event->staff->surname),
                    'status' => [
                        'id' => $event->event_status_id,
                        'locale' => $locale
                    ],
                    'location' => [
                        'lat' => $event->lat,
                        'lon' => $event->lon
                    ],
                    'date' => substr($event->created_at, 0, 10) . ' ' . substr($event->created_at, 11, 19)
                ]);
            }
        }
        return datatables($events)->make(true);
    }
}
