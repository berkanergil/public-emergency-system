<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Event;
use App\Models\MergedReport;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class MergedReportsController extends Controller
{
    public function merge(
        Request $request
    ) {
        try {
            $mergedEvent = MergedReport::where('event_id', $request->id)->get();
            if ($mergedEvent) {
                $mergedEvent = MergedReport::where('event_id', $request->id)->get();
                $events = Event::where('id', '=', $request->id)->get();

                foreach ($events as  $event) {
                    $event->merged_report_id = $request->id;
                    $event->save();
                }
            } else {
                return
                    response(MergedReport::create([
                        "event_id" => $request->input("event_id")
                    ]));
            }
        } catch (Exception $e) {
        }
    }
}
