<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.reservation.index');

    }
    public function getReservations(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Reservation::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/reservations/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.reservation.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
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
            return response()->json(['message' => $isSaved ? "Reservation created successfully" : "Failed to create Reservation"], $isSaved ? 200:400);
        }else
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reservation = Reservation::find($id);
        return response()->view('cms.reservation.edit', ['reservation'=>$reservation]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|min:3',
            'phone' => 'required|numeric',
            'date' => 'required|date|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'num_of_people' => 'required|numeric|min:2|max:10',
        ]);
        if(!$validator->fails()){
            $reservation = Reservation::find($id);
            $reservation->name =$request->get('name');
            $reservation->email = $request->get('email');
            $reservation->phone = $request->get('phone');
            $reservation->date = $request->get('date');
            $reservation->time = $request->get('time');
            $reservation->num_of_people = $request->get('num_of_people');
            $reservation->message= $request->get('message');

            $isSaved = $reservation->save();
            return response()->json(['message' => $isSaved ? "Reservation Updated successfully" : "Failed to Update Reservation"], $isSaved ? 200:400);
        }else
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $isDeleted = Reservation::destroy($id);
        return response()->json(['message' => $isDeleted ? "Reservation Deleted successfully" : "Failed to Delete Reservation"], $isDeleted ? 200:400);

    }
}
