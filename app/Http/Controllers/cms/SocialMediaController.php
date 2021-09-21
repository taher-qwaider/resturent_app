<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.social.index');
    }
    public function getSocialMedia(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Setting::where('key', 'socials')->first()->socials)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/socialMedias/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.social.create');
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
            'name' => 'required|string|min:3',
            'url' => 'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $socialMedia = new SocialMedia();

            $socialMedia->name = $request->get('name');
            $socialMedia->url = $request->get('url');

            $isSaved = Setting::where('key', 'socials')->first()->socials()->save($socialMedia);
            return response()->json(['message' => $isSaved ? "Social Media created successfully" : "Failed to create Social Media"], $isSaved ? 200:400);

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
        $social =SocialMedia::find($id);
        return response()->view('cms.social.edit', ['social'=>$social]);
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
            'url' => 'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $socialMedia = SocialMedia::find($id);

            $socialMedia->name = $request->get('name');
            $socialMedia->url = $request->get('url');

            $isSaved = $socialMedia->save();
            return response()->json(['message' => $isSaved ? "Social Media updated successfully" : "Failed to update Social Media"], $isSaved ? 200:400);

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
        //.
        $isDeleted = SocialMedia::destroy($id);
        return response()->json(['message' => $isDeleted ? "Social Deleted successfully" : "Failed to Delete Social"], $isDeleted ? 200:400);

    }
}
