<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Group;
use App\Models\Staff;
use App\Models\EventType;
use App\Models\GroupEvent;
use App\Models\EventStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GroupEventController;
use Illuminate\Support\Facades\Log;

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


Route::get('/login', function (Request $request) {
    return view("auth.login");
})->name('enter');
Route::post("/login", function (Request $request) {
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
        }
        // return redirect()->route("statistics", ["id" => $staff_json->id]);
    } else {
        return view("auth.login");
    }
})->name("login");

Route::get('/statistics', function (Request $request) {
    $staff = Staff::find($request->id);
    $eventObject = new Event;
    $staffObject = new Staff;
    $groupEventObject = new GroupEvent;
    return view('authority.statistics', compact("staff", "eventObject", "staffObject", "groupEventObject"));
})->name('statistics');

Route::get('/dashboard', function (Request $request) {
    $staff = Staff::find($request->id);

    return view('authority.dashboard', compact("staff"));
})->name('dashboard');

Route::get('/newReport', function (Request $request) {
    $staff = Staff::find(Auth::id());
    return view("authority.newReport", compact("staff"));
})->name('newReport');

Route::get('/all_authorities', function () {
    $staffObject = new Staff;
    return view("admin.all_authorities", compact("staffObject"));
})->name('all_authorities');


Route::get('/create_authorities', function (Request $request) {
    return view("admin.create_authorities");
})->name('create_authorities');
Route::post('/create_authorities', function (Request $request) {
    $staffControllerObject = new StaffController;
    $response = $staffControllerObject->store($request);
    if ($response?->status() == 200) {
        $staff_json = json_decode($response->content());
        return redirect()->route("one_authority", ["id" => $staff_json->id]);
    } else {
        return back();
    }
})->name('create_authorities');

Route::get(
    '/one_authority/{id}',
    function ($id) {
        $staff = Staff::find($id);
        return view("admin.one_authority", compact("staff"));
    }
)->name('one_authority');

Route::get('/editAuthority/{id}', function ($id) {
    $staff = Staff::find($id);
    return view("admin.editAuthority", compact("staff"));
})->name('editAuthority');
Route::put('/updateAuthority/{id}', function (Request $request, $id) {
    $staffControllerObject = new StaffController;
    $response = $staffControllerObject->update($request, $id);
    if ($response?->status() == 200) {
        $staff = Staff::find($id);
        return redirect()->route("one_authority", ["id" => $staff->id]);
    } else {
        return back();
    }
    return view("admin.one_authority", compact("staff"));
})->name('updateAuthority');



Route::get('/all_agents', function () {
    $staffObject = new Staff;
    return view("authority.all_agents", compact("staffObject"));
})->name('all_agents');


Route::get('/create_agents', function (Request $request) {
    return view("admin.create_agents");
})->name('create_agents');
Route::post('/create_agents', function (Request $request) {
    $staffControllerObject = new StaffController;
    $response = $staffControllerObject->store($request);
    if ($response?->status() == 200) {
        $staff_json = json_decode($response->content());
        return redirect()->route("one_agent", ["id" => $staff_json->id]);
    } else {
        return back();
    }
})->name('create_agents');

Route::get(
    '/one_agent/{id}',
    function ($id) {
        $staff = Staff::find($id);
        return view("authority.one_agent", compact("staff"));
    }
)->name('one_agent');

Route::get('/edit_agent/{id}', function ($id) {
    $staff = Staff::find($id);
    return view("authority.edit_profile", compact("staff"));
})->name('edit_agent');
Route::put('/update_agent/{id}', function (Request $request, $id) {
    $staffControllerObject = new StaffController;
    $response = $staffControllerObject->update($request, $id);
    if ($response?->status() == 200) {
        $staff = Staff::find($id);
        return redirect()->route("one_agent", ["id" => $staff->id]);
    } else {
        return back();
    }
    return view("authority.one_agent", compact("staff"));
})->name('update_agent');

Route::get('/all_users', function () {
    $userObject = new User;
    return view("authority.all_users", compact("userObject"));
})->name('all_users');

Route::get(
    '/one_user/{id}',
    function ($id) {
        $user = User::find($id);
        return view("authority.one_user", compact("user"));
    }
)->name('one_user');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::get('/current_archives', function () {
    $eventObject = new Event();
    return view("authority.current_archives", compact("eventObject"));
})->name('current_archives');

Route::get('/past_archives', function () {
    $eventObject = new Event();
    return view("authority.past_archives", compact("eventObject"));
})->name('past_archives');

Route::get('/eventpage/{id}', function ($id) {
    $event = Event::find($id);
    if($event==null){
        return abort(404);
    }else{
        return view("authority.eventpage", compact("event"));
    }
})->name('eventpage');

Route::get('/edit_report/{id}', function ($id) {
    $event = Event::find($id);
    $eventTypeObject = new EventType();
    $groupObject = new Group();
    $eventStatusObject = new EventStatus();
    return view("authority.edit_report", compact("event", "eventTypeObject", "groupObject", "eventStatusObject"));
})->name('edit_report');

Route::delete('/delete_report/{id}', function ($id) {
    $eventControllerObject = new EventController();
    $response = $eventControllerObject->destroy($id);
    if ($response?->status() == 200) {
        return redirect()->route("statistics",["id" => Auth::id()]);
    }else{
        return back();
    }
})->name('delete_report');

Route::put('/update_report/{id}', function (Request $request, $id) {
    $eventControllerObject = new EventController();
    $response = $eventControllerObject->update($request, $id);
    if ($response?->status() == 200) {
        $event = Event::find($id);
        if ($event->groupEvent == null && $request->input("group_id") != null) {
            $group_event = GroupEvent::create([
                'event_id' => $event->id,
                'assigner_staff_id' => Auth::id(),
                'group_id' => $request->input("group_id"),
                'event_status_id' => $request->input("event_status_id"),
            ]);
            return redirect()->route("eventpage", ["id" => $event->id]);
        }else if ($event->groupEvent != null && $request->input("group_id") != null) {
            $event->groupEvent->update([
                "group_id"=>$request->input("group_id")
            ]);
            return redirect()->route("eventpage", ["id" => $event->id]);
        }else if ($event->groupEvent != null && $request->input("group_id") == null) {
            $event->groupEvent->delete();
            return redirect()->route("eventpage", ["id" => $event->id]);
        } else {
            return back();
        }
        
    } else {
        return back();
    }
    return view("authority.one_agent", compact("staff"));
})->name('update_report');

Route::get('/form_agent_groups', [App\Http\Controllers\HomeController::class, 'form_agent_groups'])->name('form_agent_groups');
Route::get('/agent_groups', [App\Http\Controllers\HomeController::class, 'agent_groups'])->name('agent_groups');
Route::get('/one_agentGroup', [App\Http\Controllers\HomeController::class, 'one_agentGroup'])->name('one_agentGroup');

Route::get('/edit_profile', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('edit_profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adminDashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('adminDashboard');
