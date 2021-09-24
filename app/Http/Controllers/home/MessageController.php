<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|min:3',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        if(!$validator->fails()){
            $message = new Message();
            $message->name =$request->get('name');
            $message->email = $request->get('email');
            $message->subject = $request->get('subject');
            $message->message = $request->get('message');

            $isSaved = $message->save();
            return response()->json(['message' => $isSaved ? "Message created successfully" : "Failed to create Message"], $isSaved ? 200:400);
        }else
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
    }
}
