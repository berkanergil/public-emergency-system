<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Staff::all();
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
        $email=Staff::where("email",$request->email)->first();
        if(isset($email)){
            return false;
        }else{
            $password = Hash::make($request->password);
            $user=Staff::create($request->all())->update(["password" => $password]);
            return $user;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Staff::find($id);
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
        $staff=Staff::find($id)->update($request->all());
        if(isset($request->password)){
            $password=Hash::make($request->password);
            $staff=Staff::find($id);
            $staff->update(["password"=>$password]);
            return $staff->update(["password"=>$password]);
        }else{
            return $staff;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return Staff::destroy($id);
    }

    public function login(Request $request){
        $user= Staff::where('email',$request->email)->first();
        $checkLogin = $user->email == $request->email && $user->password== Hash::make($request->password);
        if(Hash::make($checkLogin)){
            return $user;
        }else{
            return false;
        }
        
    }
}
