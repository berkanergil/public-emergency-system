<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function chatPage()
    {
        return view('system_operations.chatPage');
    }
    public function createPage()
    {
        return view('system_operations.createMessages');
    }
    public function messages()
    {
        return view('system_operations.messages');
    }
    public function createPagee()
    {
        return view('system_operations.createNotifications');
    }
    public function notifications()
    {
        return view('system_operations.notifications');
    }
}
