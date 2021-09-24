<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{

    public function __construct()
    {
//        $this->authorizeResource(Setting::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subject)
    {
        //
        $this->authorize('read-settings');
        return response()->view('cms.setting.index', ['subject' => $subject]);
    }
    public function getSettings(Request $request, $subject){
        if ($request->ajax()) {
            return DataTables::of(Setting::where('subject', $subject)->get())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/settings/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        $this->authorize('create-settings');
        return response()->view('cms.setting.create');

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
            'key' => 'required|string|min:3',
            'value' => 'required|string|min:3',
            'subject' => 'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $setting = new Setting();

            $setting->key = $request->get('key');
            $setting->value = $request->get('value');
            $setting->subject = $request->get('subject');
            $isSaved = $setting->save();
            return response()->json(['message' => $isSaved ? "Setting created successfully" : "Failed to create Setting"], $isSaved ? 200:400);

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
        $this->authorize('edit-settings');
        $setting = Setting::find($id);
        return response()->view('cms.setting.edit', ['setting'=>$setting]);
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
            'key' => 'required|string|min:3',
            'subject' => 'required|string|min:3',
            'value' => 'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $setting = Setting::find($id);

            $setting->key = $request->get('key');
            $setting->value = $request->get('value');
            $setting->subject = $request->get('subject');
            $isSaved = $setting->save();
            return response()->json(['message' => $isSaved ? "Setting Updated successfully" : "Failed to Updated Setting"], $isSaved ? 200:400);

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
        $this->authorize('delete-settings');
        $isDeleted = Setting::destroy($id);
        return response()->json(['message' => $isDeleted ? "Setting Deleted successfully" : "Failed to Delete Setting"], $isDeleted ? 200:400);

    }
}
