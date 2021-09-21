<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
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
        return response()->view('cms.user.index');

    }
    public function getUsers(Request $request){
        if ($request->ajax()) {
            return DataTables::of(User::withCount('permissions')->get())
                ->addIndexColumn()
                ->addColumn('permissions_count', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/user/$row->id/permissions' class='edit btn btn-success btn-sm'>$row->permissions_count / Permissions</a>";
                    return $actionBtn;
                })
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/users/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
                    return $actionBtn;
                })
                ->rawColumns(['action', 'permissions_count'])
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
        return response()->view('cms.user.create');

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
            'email' => 'required|email|unique:users,email',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if(!$validator->fails()){
            $user = new User();

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make('password');
            $user->save();
            $user = $user->refresh();
            if ($request->hasFile('image')){
                $image = new Image();
                $this->uploadFile($request->file('image'), 'images/chefs/', 'public', 'chef_'. $request->file('image')->getBasename() . time());
                $image->path = $this->filePath;
                $user->image()->save($image);
            }
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? "User created successfully" : "Failed to create User"], $isSaved ? 200:400);
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
        $user = User::find($id);
        return response()->view('cms.user.edit', ['user' =>$user]);
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
            'email' => 'required|email|unique:users,email,'.$id,
//            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if(!$validator->fails()){
            $user = User::find($id);

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->save();
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/chefs/', 'public', 'chef_'. $request->file('image')->getBasename() . time());
                $user->image->path = $this->filePath;
                $user->image()->save();
            }
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? "User Updated successfully" : "Failed to Update User"], $isSaved ? 200:400);
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
        $isDeleted = User::destroy($id);
        return response()->json(['message' => $isDeleted ? "User Deleted successfully" : "Failed to Delete User"], $isDeleted ? 200:400);

    }
}
