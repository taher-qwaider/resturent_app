<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.events.index');

    }
    public function getEvents(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Event::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/events/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.events.create');
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
        $validator = Validator($request->all(), [
            'title_en' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'desc_en' => 'required|string|min:3',
            'desc_ar' => 'required|string|min:3',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if(!$validator->fails()){
            $event = new Event();
            foreach (config('app.available_locales') as $local) {
                $event->translateOrNew($local)->title = $request->get('title_' . $local);
                $event->translateOrNew($local)->desc = $request->get('desc_' . $local);
            }
            $event->price = $request->get('price');
            $event->save();
            $event = $event->refresh();
            if ($request->hasFile('image')){
                $image = new Image();
                $this->uploadFile($request->file('image'), 'images/events/', 'public', 'event_'. $request->file('image')->getBasename() . time());
                $image->path = $this->filePath;
                $event->image()->save($image);
            }
            $isSaved = $event->save();
            return response()->json(['message' => $isSaved ? "Event created successfully" : "Failed to create Event"], $isSaved ? 200:400);
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
        $event = Event::find($id);
        return response()->view('cms.events.edit', ['event'=>$event]);
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
            'title_en' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'desc_en' => 'required|string|min:3',
            'desc_ar' => 'required|string|min:3',
            'price' => 'required|numeric',
//            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if(!$validator->fails()){
            $event = Event::find($id);
            foreach (config('app.available_locales') as $local) {
                $event->translateOrNew($local)->title = $request->get('title_' . $local);
                $event->translateOrNew($local)->desc = $request->get('desc_' . $local);
            }
            $event->price = $request->get('price');
            $event->save();
            $event = $event->refresh();
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/events/', 'public', 'event_'. $request->file('image')->getBasename() . time());
                $event->image->path = $this->filePath;
                $event->image->save();
            }
            $isSaved = $event->save();
            return response()->json(['message' => $isSaved ? "Event Updated successfully" : "Failed to Update Event"], $isSaved ? 200:400);
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
        $isDeleted = Event::destroy($id);
        return response()->json(['message' => $isDeleted ? "Meal Deleted successfully" : "Failed to Delete Meal"], $isDeleted ? 200:400);
    }
}
