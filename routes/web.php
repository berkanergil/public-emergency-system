<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StaffController;
use App\Models\Staff;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('login');
// });



Route::get('/login', [App\Http\Controllers\StaffController::class, 'enter'])->name('enter');
Route::get('/statistics', function (Request $request) {
    $staff=Staff::find($request->id);
    return view('authority.statistics',compact("staff"));
})->name('statistics');

Route::get('/dashboard', function (Request $request) {
    $staff=Staff::find($request->id);

    return view('authority.dashboard',compact("staff"));
})->name('dashboard');

Route::post("/login", function (Request $request) {
    $staffController = new StaffController;
    $response = $staffController->login($request);
    if ($response?->status() == 200) {
        $staff_json = json_decode($response->content());
        return redirect()->route("statistics", ["id" => $staff_json->id]);
    } else {
        return view("auth.login");
    }
})->name("login");

Route::get('/eventpage', [App\Http\Controllers\HomeController::class, 'eventpage'])->name('eventpage');
Route::get('/edit_report', [App\Http\Controllers\HomeController::class, 'edit_report'])->name('edit_report');
Route::get('/past_archives', [App\Http\Controllers\HomeController::class, 'past_archives'])->name('past_archives');
Route::get('/current_archives', [App\Http\Controllers\HomeController::class, 'current_archives'])->name('current_archives');
Route::get('/newReport', function(Request $request){
    $staff=Staff::find($request->id);
    return view("authority.newReport",compact("staff"));
})->name('newReport');

Route::get('/all_agents', [App\Http\Controllers\HomeController::class, 'all_agents'])->name('all_agents');
Route::get('/one_agent', [App\Http\Controllers\HomeController::class, 'one_agent'])->name('one_agent');
Route::get('/all_users', [App\Http\Controllers\HomeController::class, 'all_users'])->name('all_users');
Route::get('/one_user', [App\Http\Controllers\HomeController::class, 'one_user'])->name('one_user');
Route::get('/form_agent_groups', [App\Http\Controllers\HomeController::class, 'form_agent_groups'])->name('form_agent_groups');
Route::get('/agent_groups', [App\Http\Controllers\HomeController::class, 'agent_groups'])->name('agent_groups');
Route::get('/one_agentGroup', [App\Http\Controllers\HomeController::class, 'one_agentGroup'])->name('one_agentGroup');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/edit_profile', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('edit_profile');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
<<<<<<< HEAD
Route::get('/statistics', [App\Http\Controllers\HomeController::class, 'statistics'])->name('statistics');



/*ADMIN ROUTES */
Route::get('/adminDashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('adminDashboard');
Route::get('/create_authorities', [App\Http\Controllers\HomeController::class, 'create_authorities'])->name('create_authorities');
Route::get('/create_agents', [App\Http\Controllers\HomeController::class, 'create_agents'])->name('create_agents');
Route::get('/all_authorities', [App\Http\Controllers\HomeController::class, 'all_authorities'])->name('all_authorities');
Route::get('/one_authority', [App\Http\Controllers\HomeController::class, 'one_authority'])->name('one_authority');
=======
>>>>>>> b216c7588a74b71096e94a2c191c70452d0024fe
