<?php

namespace App\Http\Controllers\cms\spatie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.spatie.role.index');

    }
    public function getRoles(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Role::withCount('permissions')->get())
                ->addIndexColumn()
                ->addColumn('permissions_count', function($row){
                    $actionBtn = "<a href='/panel/cms/role/$row->id/permissions' class='edit btn btn-success btn-sm'>$row->permissions_count / Permissions</a>";
                    return $actionBtn;
                })
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/panel/cms/roles/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.spatie.role.create');

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
            'name' => 'required|string|unique:permissions,name',
        ]);
        if(!$validator->fails()){
            $role =new Role();
            $role->name =$request->get('name');
            $role->guard_name = 'user';
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ? "Role created successfully" : "Failed to create Role"], $isSaved ? 200:400);
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
        $role = Role::findById($id);
        return response()->view('cms.spatie.role.edit', ['role' => $role]);
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
            'name' => 'required|string|unique:permissions,name,'.$id,
        ]);
        if(!$validator->fails()){
            $role =Role::findById($id);
            $role->name =$request->get('name');
            $role->guard_name = 'user';
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ? "Role Updated successfully" : "Failed to Updated Role"], $isSaved ? 200:400);
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
        $isDeleted = Role::destroy($id);
        return response()->json(['message' => $isDeleted ? "Role Deleted successfully" : "Failed to Delete Role"], $isDeleted ? 200:400);

    }
}
