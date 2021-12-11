<?php

use App\Http\Controllers\StaffEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('users')->group(function () {
    Route::post('/login', [UserController::class, 'login']);
});
Route::resource('users', UserController::class); 
Route::resource('departments', DepartmentController::class); 
Route::resource('documents', DocumentController::class); 
Route::resource('events', EventController::class); 
Route::resource('event-status', EventStatusController::class); 
Route::resource('groups', GroupController::class); 
Route::resource('group-events', GroupEventController::class); 
Route::resource('notifications', NotificationController::class); 
Route::resource('notification-types', NotificationTypeController::class);
Route::prefix('staffs')->group(function () {
    Route::post('/login', [StaffController::class, 'login']);
}); 
Route::resource('staffs', StaffController::class); 
Route::resource('staff-events', StaffEventController::class); 
Route::resource('staff-roles', StaffRoleController::class);  
