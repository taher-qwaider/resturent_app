<?php

namespace App\Http\Controllers\cms\spatie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.spatie.permission.index');
    }
    public function getPermissions(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Permission::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/permissions/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.spatie.permission.create');
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
            $permission =new Permission();
            $permission->name =$request->get('name');
            $permission->guard_name = 'user';
            $isSaved = $permission->save();
            return response()->json(['message' => $isSaved ? "Permission created successfully" : "Failed to create Permission"], $isSaved ? 200:400);
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
        $permission = Permission::findById($id);
        return response()->view('cms.spatie.permission.edit', ['permission' => $permission]);

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
//        dump($request->all());
        $validator = Validator($request->all(), [
            'name' => 'required|string|unique:permissions,name,'.$id,
        ]);
        if(!$validator->fails()){
            $permission =Permission::findById($id);
            $permission->name =$request->get('name');
            $permission->guard_name = 'user';
            $isSaved = $permission->save();
            return response()->json(['message' => $isSaved ? "Permission Updated successfully" : "Failed to Updated Permission"], $isSaved ? 200:400);
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
        $isDeleted = Permission::destroy($id);
        return response()->json(['message' => $isDeleted ? "Permission Deleted successfully" : "Failed to Delete Permission"], $isDeleted ? 200:400);

    }
}
