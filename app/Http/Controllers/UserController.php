<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return User::all();
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
        $email=User::where("email",$request->email)->first();
        if(isset($email)){
            return false;
        }else{
            $password = Hash::make($request->password);
            $user=User::create($request->all())->update(["password" => $password]);
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
        return User::find($id);
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
        $user=User::find($id)->update($request->all());
        if(isset($request->password)){
            $password=Hash::make($request->password);
            $user=User::find($id);
            $user->update(["password"=>$password]);
            return $user->update(["password"=>$password]);
        }else{
            return $user;
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
        return User::destroy($id);
    }


    public function login(Request $request){
        $user= User::where('email',$request->email)->first();
        $checkLogin = $user->email == $request->email && $user->password== Hash::make($request->password);
        if(Hash::make($checkLogin)){
            return $user;
        }else{
            return false;
        }
        
    }
}
