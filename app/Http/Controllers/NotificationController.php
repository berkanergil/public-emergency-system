<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return response(Notification::all());
    }
    public function store(Request $request)
    {
        return response(Notification::create($request->all()));
    }
    public function update(Request $request, $id)
    {
        $notification = Notification::find($id)->update($request->all());
        if (isset($request->password)) {
            $notification = Notification::find($id);
            $notification->update()->$request->all();
            return response($notification);
        } else {
            return response($notification);
        }
    }
    public function destroy($id)
    {
        return response(Notification::destroy($id));
    }
}
