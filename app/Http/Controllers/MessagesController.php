<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        return response(Message::all());
    }
    public function store(Request $request)
    {
        return response(Message::create($request->all()));
    }
    public function update(Request $request, $id)
    {
        $message = Message::find($id)->update($request->all());
        if (isset($request->password)) {
            $message = Message::find($id);
            $message->update()->$request->all();
            return response($message);
        } else {
            return response($message);
        }
    }
    public function destroy($id)
    {
        return response(Message::destroy($id));
    }
}
