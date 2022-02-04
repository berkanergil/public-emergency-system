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
    public function form_agent_groups()
    {
        return view('authority.form_agent_groups');
    }
    public function agent_groups()
    {
        return view('authority.agent_groups');
    }
    public function one_agentGroup()
    {
        return view('authority.one_agentGroup');
    }
    public function profile()
    {
        return view('authority.profile');
    }
    public function edit_profile()
    {
        return view('authority.edit_profile');
    }
    /*ADMIN ROUTES */
    public function adminDashboard()
    {
        return view('admin.adminDasboard');
    }
    public function create_authorities()
    {
        return view('admin.create_authorities');
    }
    public function create_agents()
    {
        return view('admin.create_agents');
    }
    public function all_authorities()
    {
        return view('admin.all_authorities');
    }
    public function one_authority()
    {
        return view('admin.one_authority');
    }
    public function editAuthority()
    {
        return view('admin.editAuthority');
    }
    public function chatPage()
    {
        return view('authority.chatPage');
    }
}
