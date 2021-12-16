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
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('authority.dashboard');
    }
    public function statistics()
    {
        return view('authority.statistics');
    }
    public function eventpage()
    {
        return view('authority.eventpage');
    }
    public function edit_report()
    {
        return view('authority.edit_report');
    }
    public function past_archives()
    {
        return view('authority.past_archives');
    }
    public function newReport()
    {
        return view('authority.newReport');
    }
    public function current_archives()
    {
        return view('authority.current_archives');
    }
    public function all_agents()
    {
        return view('authority.all_agents');
    }
    public function one_agent()
    {
        return view('authority.one_agent');
    }
    public function all_users()
    {
        return view('authority.all_users');
    }
    public function one_user()
    {
        return view('authority.one_user');
    }
    public function agent_groups()
    {
        return view('authority.agent_groups');
    }
}
