<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Group;
use App\Models\Notes;
use App\Models\Staff;
use App\Models\Message;
use App\Models\Document;
use App\Models\EventType;
use App\Models\Department;
use App\Models\GroupEvent;
use App\Models\EventStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GroupEventController;
use App\Http\Controllers\StaffEventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('language/{locale?}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('switchLanguage');

Route::get('/', function (Request $request) {
    return view("layouts.index");
});

Route::prefix('/login')->group(function () {
    Route::get('/', function (Request $request) {
        return view("auth.login");
    })->name('enter');

    Route::post("/", function (Request $request) {
        $staffController = new StaffController;
        $response = $staffController->login($request);
        if ($response?->status() == 200) {
            $staff_json = json_decode($response->content());
            $staff = Staff::find($staff_json->id);
            Auth::login($staff);
            $role = Staff::find(Auth::id())->staff_role_id;
            if ($role == "1") {
                return redirect()->route('statistics', ["id" => Auth::id()]);
            } elseif ($role == "3") {
                return redirect()->route('statistics', ["id" => Auth::id()]);
            } else {
                return back();
            }
            // return redirect()->route("statistics", ["id" => $staff_json->id]);
        } else {
            return view("auth.login");
        }
    })->name("login");
});

Route::prefix('admin/statistics')->group(function () {
    Route::get('', function (Request $request) {
        $staff = Staff::find($request->id);
        $eventObject = new Event;
        $staffObject = new Staff;
        $groupEventObject = new GroupEvent;
        return view('system_operations.statistics', compact("staff", "eventObject", "staffObject", "groupEventObject"));
    })->name('statistics');

    // Route::get('', function (Request $request) {
    //     $staff = Staff::find($request->id);

    //     return view('layouts.dashboard', compact("staff"));
    // })->name('dashboard');
});

Route::prefix('admin/reports/')->group(function () {
    Route::get('newReports', function (Request $request) {
        $staff = Staff::find(Auth::id());
        $lat_lon_handled = Event::where('event_status_id', '=', '1')->get();
        $lat_lon_not_handled = Event::where('event_status_id', '=', '3')->get();
        $lat_lon_being_handled = Event::where('event_status_id', '=', '2')->get();
        $lat_lon_merged = Event::where('event_status_id', '=', '4')->get();
        return view("report_operations.newReports", compact("staff", "lat_lon_handled", "lat_lon_not_handled", "lat_lon_being_handled", "lat_lon_merged"));
    })->name('newReports');

    Route::get('currentReports', function () {
        $eventObject = new Event();
        return view("report_operations.currentReports", compact("eventObject"));
    })->name('currentReports');

    Route::get('pastReports', function () {
        $eventObject = new Event();
        return view("report_operations.pastReports", compact("eventObject"));
    })->name('pastReports');


    Route::get('report/{id}', function ($id) {
        $event = Event::find($id);
        if ($event == null) {
            return abort(404);
        } else {
            return view("report_operations.report", compact("event"));
        }
    })->name('report');

    Route::get('report/edit_report/{id}', function ($id) {

        $event = Event::find($id);
        $eventTypeObject = new EventType();
        $groupObject = new Group();
        $eventStatusObject = new EventStatus();
        return view("report_operations.edit_report", compact("event", "eventTypeObject", "groupObject", "eventStatusObject"));
    })->name('edit_report');

    Route::delete('report/delete_report/{id}', function ($id) {
        $eventControllerObject = new EventController();
        $response = $eventControllerObject->destroy($id);
        if ($response?->status() == 200) {
            return redirect()->route("statistics", ["id" => Auth::id()]);
        } else {
            return back();
        }
    })->name('delete_report');

    Route::put('report/update_report/{id}', function (Request $request, $id) {
        $eventControllerObject = new EventController();
        $response = $eventControllerObject->update($request, $id);
        if ($response?->status() == 200) {
            $event = Event::find($id);
            if ($event->groupEvent == null && $request->input("group_id") != null) {
                $group_event = GroupEvent::create([
                    'event_id' => $event->id,
                    'assigner_staff_id' => Auth::id(),
                    'group_id' => $request->input("group_id"),
                ]);
                $event->update([
                    "event_status_id" => 2
                ]);
                return redirect()->route("report", ["id" => $event->id]);
            } else if ($event->groupEvent != null && $request->input("group_id") != null) {
                $event->groupEvent->update([
                    "group_id" => $request->input("group_id")
                ]);
                return redirect()->route("report", ["id" => $event->id]);
            } else {
                return back();
            }
        } else {
            return back();
        }
        return view("role_operations.agent_operations.agent", compact("staff"));
    })->name('update_report');


    Route::get('/mergedReports', function () {
        $eventObject = new Event();
        return view("report_operations.mergedReports", compact("eventObject"));
    })->name('mergedReports');
});

Route::prefix('admin/staff/')->group(function () {
    Route::get('authorities', function () {
        $staffObject = new Staff;
        return view("role_operations.authority_operations.authorities", compact("staffObject"));
    })->name('authorities');


    Route::get('authorities/createAuthority', function (Request $request) {
        return view("role_operations.authority_operations.createAuthority");
    })->name('createAuthority');

    Route::post('authorities/createAuthority', function (Request $request) {
        $staffControllerObject = new StaffController;
        $response = $staffControllerObject->store($request);
        if ($response?->status() == 200) {
            $staff_json = json_decode($response->content());
            return redirect()->route("authority", ["id" => $staff_json->id]);
        } else {
            return back();
        }
    })->name('createAuthority');

    Route::get(
        'authorities/authority/id:{id}',
        function ($id) {
            $staff = Staff::find($id);
            return view("role_operations.authority_operations.authority", compact("staff"));
        }
    )->name('authority');

    Route::get('authorities/editAuthority/id:{id}', function ($id) {
        $staff = Staff::find($id);
        return view("role_operations.authority_operations.editAuthority", compact("staff"));
    })->name('editAuthority');

    Route::put('authorities/updateAuthority/id:{id}', function (Request $request, $id) {
        $staffControllerObject = new StaffController;
        $response = $staffControllerObject->update($request, $id);
        if ($response?->status() == 200) {
            $staff = Staff::find($id);
            return redirect()->route("authority", ["id" => $staff->id]);
        } else {
            return back();
        }
        return view("role_operations.authority_operations.authority", compact("staff"));
    })->name('updateAuthority');

    Route::get('agents', function () {
        $staffObject = new Staff;
        return view("role_operations.agent_operations.agents", compact("staffObject"));
    })->name('agents');

    Route::get('admin/editAgent/id:{id}', function ($id) {
        $department = Department::get();
        $staff = Staff::find($id);
        return view("role_operations.agent_operations.editAgent", compact("staff", "department"));
    })->name('editAgent');

    Route::put('agents/updateAgent/id:{id}', function (Request $request, $id) {
        $staffControllerObject = new StaffController;
        $response = $staffControllerObject->update($request, $id);
        if ($response?->status() == 200) {
            $staff = Staff::find($id);
            return redirect()->route("agent", ["id" => $staff->id]);
        } else {
            return back();
        }
        return view("role_operations.authority_operations.authority", compact("staff"));
    })->name('updateAuthority');

    Route::delete('/delete_authority/id:{id}', function ($id) {
        $eventControllerObject = new StaffController();
        $response = $eventControllerObject->destroy($id);
    })->name('delete_authority');

    Route::get('agents/createAgents', function (Request $request) {
        $departmentTypeObject = new Department();
        return view("role_operations.agent_operations.createAgents", compact("departmentTypeObject"));
    })->name('createAgents');

    Route::post('agents/createAgents', function (Request $request) {
        $staffControllerObject = new StaffController;
        $response = $staffControllerObject->store($request);
        if ($response?->status() == 200) {
            $staff_json = json_decode($response->content());
            return redirect()->route("agent", ["id" => $staff_json->id]);
        } else {
            return back();
        }
    })->name('createAgents');

    Route::get(
        'agents/agent/id:{id}',
        function ($id) {
            $staff = Staff::find($id);
            return view("role_operations.agent_operations.agent", compact("staff"));
        }
    )->name('agent');

    Route::put('agents/update_agent/id:{id}', function (Request $request, $id) {
        $staffControllerObject = new StaffController;
        $response = $staffControllerObject->update($request, $id);
        if ($response?->status() == 200) {
            $staff = Staff::find($id);
            return redirect()->route("agent", ["id" => $staff->id]);
        } else {
            return back();
        }
        return view("role_operations.agent_operations.agent", compact("staff"));
    })->name('update_agent');

    Route::delete('agent/delete_agent/{id}', function ($id) {
        $eventControllerObject = new StaffController();
        $response = $eventControllerObject->destroy($id);
    })->name('delete_agent');


    Route::get('agents/deployAgentGroups', function () {
        $staffObject = new Staff();
        return view("role_operations.agent_operations.deployAgentGroups", compact("staffObject"));
    })->name('deployAgentGroups');

    Route::post('agents/deployAgentGroups', function (Request $request) {
        $group_id = Group::latest()?->first()?->group_id + 1 ?? 1;
        $group = [];
        foreach ($request->agents_id as $agent_id) {
            $row = Group::create([
                "group_id" => $group_id,
                "staff_id" => $agent_id,
                "creater_staff_id" => Auth::id()
            ]);
            $group[] = $row;
        }
        return redirect()->route("agentGroup", $group_id);
    })->name('deployAgentGroups');

    Route::post('agents/agentGroups', function (Request $request) {
        $deleted_groups = Group::where('group_id', $request->group_id)->get()->pluck("id");
        $result = Group::destroy($deleted_groups);
        $groups = Group::select("group_id")->groupBy("group_id")->get();
        return view("role_operations.agent_operations.agentGroups", compact("groups"));
    })->name('disbandGroups');

    Route::get('agents/agentGroups', function (Request $request) {
        $groups = Group::select("group_id")->groupBy("group_id")->get();
        return view("role_operations.agent_operations.agentGroups", compact("groups"));
    })->name('agentGroups');

    Route::get('agents/agentGroup/id:{id}', function (Request $request) {
        $group = Group::where("group_id", $request->id)->get();

        return view("role_operations.agent_operations.agentGroup", compact("group"));
    })->name('agentGroup');
});

Route::prefix('admin/profile/')->group(function () {
    Route::get('{id}', function ($id) {
        $staff = Staff::find($id);
        return view('profile_operations.profile', compact("staff"));
    })->name('profile');

    Route::put('editProfile/{id}', function (Request $request, $id) {
        $staffControllerObject = new StaffController;
        $response = $staffControllerObject->update($request, $id);
        if ($response?->status() == 200) {
            $staff = Staff::find($id);
            return redirect()->route("profile", ["id" => $staff->id]);
        } else {
            return back();
        }
        return view("profile_operations.editProfile", compact("staff"));
    })->name('editProfile');

    Route::get('editProfile/{id}', function ($id) {
        $staff = Staff::find($id);
        return view('profile_operations.editProfile', compact("staff"));
    })->name('editProfile');
});

Route::prefix('admin/users/')->group(function () {
    Route::get('', function () {
        $userObject = new User;
        return view("role_operations.user_operations.users", compact("userObject"));
    })->name('users');

    Route::get(
        'user/id:{id}',
        function ($id) {
            $user = User::find($id);
            return view("role_operations.user_operations.user", compact("user"));
        }
    )->name('user');

    Route::get('user/edit_user/{id}', function ($id) {
        $user = User::find($id);
        return view("role_operations.user_operations.edit_user", compact("user"));
    })->name('edit_user');
});




Route::post('/store_evidence/{id}', function (Request $request, $id) {
    Log::info('web');
    $documentControllerObject = new DocumentController();
    $response = $documentControllerObject->store($request);
    if ($response?->status() == 200) {
        $document_json = json_decode($response->content());
        $event = Event::find($id);
        $event->update(
            [
                "document_id" => $document_json->id
            ]
        );
        return true;
    } else {
        return abort(500);
    }
})->name("store_evidence");

Route::post('/store_notes', function (Request $request) {
    $noteControllerObject = new NotesController();
    $response = $noteControllerObject->store($request);
    if ($response?->status() == 200) {
        Log::info("200");
        return true;
    } else {
        return abort(500);
    }
})->name("store_notes");

Route::post('/mark_event', function (Request $request) {
    $staffEventControllerObject = new StaffEventController();
    $response = $staffEventControllerObject->store($request);
    if ($response?->status() == 200) {
        return true;
    } else {
        return abort(500);
    }
})->name("mark_event");





Route::get('/logout', function () {
    $staff = Staff::find(Auth::id());
    Auth::logout($staff);
    return redirect()->route('enter');
})->name("logout");

Route::prefix('admin/systemOperations/')->group(function () {
    Route::get('/messages', function () {
        $messageObject = new Message();
        return view("system_operations.messages", compact("messageObject"));
    })->name('messages');

    Route::get('/createMessages', function (Request $request) {
        $messageObject = new Message();
        return view("system_operations.createMessages", compact("messageObject"));
    })->name('createMessages');

    Route::post('/createMessages', function (Request $request) {
        $messageObject = new MessagesController;
        $response = $messageObject->store($request);
        if ($response?->status() == 200) {
            $staff_json = json_decode($response->content());
            return redirect()->back();
        } else {
            return back();
        }
    })->name('createMessages');
    Route::get(
        'messages/message/id:{id}',
        function ($id) {
            $message = Message::find($id);
            return view("system_operations.message", compact("message"));
        }
    )->name('message');

    Route::get('messages/message/editMessage/id:{id}', function ($id) {
        $message = Message::find($id);
        return view("system_operations.editMessage", compact("message"));
    })->name('editMessage');

    Route::put('messages/message/editMessage/id:{id}', function (Request $request, $id) {
        $messageObject = new MessagesController;
        $response = $messageObject->update($request, $id);
        if ($response?->status() == 200) {
            $message = Message::find($id);
            return redirect()->route("message", ["id" => $messageObject->id]);
        } else {
            return back();
        }
        return view("system_operations.editMessage", compact("message"));
    })->name('editMessage');

    Route::delete('messages/message/deleteMessage/id:{id}', function ($id) {
        $messageControllerObject = new MessagesController();
        $response = $messageControllerObject->destroy($id);
        if ($response?->status() == 200) {
            return redirect()->route("messages", ["id" => Auth::id()]);
        } else {
            return back();
        }
    })->name('deleteMessage');
});


Route::get('/chatPage', [App\Http\Controllers\HomeController::class, 'chatPage'])->name('chatPage');
Route::get('admin/createNotifications', [App\Http\Controllers\HomeController::class, 'createPagee'])->name('createNotifications');
Route::get('admin/notifications', [App\Http\Controllers\HomeController::class, 'notifications'])->name('notifications');
Route::get('/emergencyp', [App\Http\Controllers\HomeController::class, 'emergencyp'])->name('emergencyp');

Route::get('reports/current/data', [EventController::class, 'reportData'])->name('reports.data');
