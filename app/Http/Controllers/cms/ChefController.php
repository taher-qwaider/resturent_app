<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Chef;
use App\Models\Image;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChefController extends Controller
{
    use FileUpload;

    public function __construct()
    {
//        $this->authorizeResource(Chef::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('read-chefs');
        return response()->view('cms.chef.index');

    }
    public function getChefs(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Chef::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/chefs/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        $this->authorize('create-chefs');
        return response()->view('cms.chef.create');

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
        $this->authorize('create-chefs');
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'degree' => 'required|string|min:3',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'socials' => 'sometimes|array'
        ]);
        if(!$validator->fails()){
            $chef = new Chef();

            $chef->name = $request->get('name');
            $chef->degree = $request->get('degree');
            $chef->save();
            $chef = $chef->refresh();
            if ($request->hasFile('image')){
                $image = new Image();
                $this->uploadFile($request->file('image'), 'images/chefs/', 'public', 'chef_'. $request->file('image')->getBasename() . time());
                $image->path = $this->filePath;
                $chef->image()->save($image);
            }
            if ($request->get('socials')){
                foreach ($request->get('socials') as $social){
                    $social_media = new SocialMedia();
                    $social_media->name = $social['name'];
                    $social_media->url = $social['url'];
                    $chef->socials()->save($social_media);
                }
            }

            $isSaved = $chef->save();
            return response()->json(['message' => $isSaved ? "Chef created successfully" : "Failed to create Chef"], $isSaved ? 200:400);
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
        $this->authorize('edit-chefs');
        $chef = Chef::find($id);
        return response()->view('cms.chef.edit', ['chef' =>$chef]);

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
        $this->authorize('edit-chefs');
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'degree' => 'required|string|min:3',
//            'image' => 'required|image|mimes:jpg,jpeg,png',
            'socials' => 'sometimes|array'
        ]);
        if(!$validator->fails()){
            $chef = Chef::find($id);

            $chef->name = $request->get('name');
            $chef->degree = $request->get('degree');
            $chef->save();
            $chef = $chef->refresh();
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/chefs/', 'public', 'chef_'. $request->file('image')->getBasename() . time());
                $chef->image->path = $this->filePath;
                $chef->image()->save();
            }
            if ($request->get('socials')){
                foreach ($request->get('socials') as $social){
                    $social_media = $chef->socials->where('name', $social['name'])->first();
                    $social_media->name = $social['name'];
                    $social_media->url = $social['url'];
                    $social_media->save();
                }
            }

            $isSaved = $chef->save();
            return response()->json(['message' => $isSaved ? "Chef Updated successfully" : "Failed to Update Chef"], $isSaved ? 200:400);
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
        $this->authorize('delete-chefs');
        $isDeleted = Chef::destroy($id);
        return response()->json(['message' => $isDeleted ? "Chef Deleted successfully" : "Failed to Delete Chef"], $isDeleted ? 200:400);

    }
}
