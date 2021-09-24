<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
//        $this->authorizeResource(Category::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('read-categories');
        return response()->view('cms.category.index');
    }
    public function getCategories(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Category::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/categories/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        $this->authorize('create-categories');
        return response()->view('cms.category.create');
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
//            'title' => 'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $category = new Category();
            foreach (config('app.available_locales') as $local)
                $category->translateOrNew($local)->title = $request->get('title_'.$local);
            $isSaved = $category->save();
            return response()->json(['message' => $isSaved ? "category created successfully" : "Failed to create Category"], $isSaved ? 200:400);

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
    public function edit(Category $category)
    {
        //
        $this->authorize('edit-categories');
        return response()->view('cms.category.edit', ['category'=>$category]);
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
//            'title' => 'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $category = Category::find($id);
            foreach (config('app.available_locales') as $local)
                $category->translateOrNew($local)->title = $request->get('title_'.$local);
            $isSaved = $category->save();
            return response()->json(['message' => $isSaved ? "category Updated successfully" : "Failed to Update Category"], $isSaved ? 200:400);
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
        $this->authorize('delete-categories');
        $isDeleted = Category::destroy($id);
        return response()->json(['message' => $isDeleted ? "category Deleted successfully" : "Failed to Delete Category"], $isDeleted ? 200:400);
    }
}
