<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //

    public function store(Request $request)
    {
        //
//        dump($request->all());
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|min:3',
            'phone' => 'required|numeric',
            'date' => 'required|date|date_format:Y-m-d',
//            'date' => 'required|date|date_format:d F, Y',
            'time' => 'required|date_format:H:i',
            'num_of_people' => 'required|numeric|min:2|max:10',
            'message' => 'required|string'
        ]);
        if(!$validator->fails()){
            $reservation = new Reservation();
            $reservation->name =$request->get('name');
            $reservation->email = $request->get('email');
            $reservation->phone = $request->get('phone');
            $reservation->date = $request->get('date');
            $reservation->time = $request->get('time');
            $reservation->num_of_people = $request->get('num_of_people');
            $reservation->message= $request->get('message');

            $isSaved = $reservation->save();
            return response()->json(['message'=>'Reservation created successfully'], 201);
        }else
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
    }
}
