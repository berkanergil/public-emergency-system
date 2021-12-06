<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            $users=User::all();
            return $users;
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
            $user=User::create($request->all());
            return $user;
        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show($id)
        {
            $user=User::find($id);
            return $user;
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
        public function update(Request $request,$id)
        {
            $user=User::find($id);
            $user->update($request->all());
            return $user;
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
}
