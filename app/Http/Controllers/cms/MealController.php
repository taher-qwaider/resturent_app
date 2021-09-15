<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Meal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MealController extends Controller
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
        return response()->view('cms.meal.index');
    }
    public function spacial()
    {
        //
        return response()->view('cms.meal.special');
    }
    public function getMeals(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Meal::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/meals/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function getSpacialMeals(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Meal::where('status', 'spacial')->get())
//                ->addIndexColumn()
//                ->addColumn('action', function($row){
//                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/meals/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
//                    return $actionBtn;
//                })
//                ->rawColumns(['action'])
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
        $categories = Category::all();
        return response()->view('cms.meal.create', [
            'categories'=> $categories
        ]);
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
            'name_en' => 'required|string|min:3',
            'name_ar' => 'required|string|min:3',
            'desc_en' => 'required|string|min:3',
            'desc_ar' => 'required|string|min:3',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'category' => 'required|numeric|exists:categories,id',
        ]);
        if(!$validator->fails()){
            $meal = new Meal();
            foreach (config('app.available_locales') as $local) {
                $meal->translateOrNew($local)->name = $request->get('name_' . $local);
                $meal->translateOrNew($local)->desc = $request->get('desc_' . $local);
            }
            $meal->price = $request->get('price');
            $meal->category_id = $request->get('category');
            $meal->save();
            $meal = $meal->refresh();
            if ($request->hasFile('image')){
                $image = new Image();
                $this->uploadFile($request->file('image'), 'images/meals/', 'public', 'meal_'. $request->file('image')->getBasename() . time());
                $image->path = $this->filePath;
                $meal->image()->save($image);
            }
            $isSaved = $meal->save();
            return response()->json(['message' => $isSaved ? "Meal created successfully" : "Failed to create Meal"], $isSaved ? 200:400);
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
        $meal = Meal::find($id);
        $categories = Category::all();
        return response()->view('cms.meal.edit', ['meal'=>$meal,'categories' =>$categories]);
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
//        dd($request->all());
        $validator = Validator($request->all(), [
            'name_en' => 'required|string|min:3',
            'name_ar' => 'required|string|min:3',
            'desc_en' => 'required|string|min:3',
            'desc_ar' => 'required|string|min:3',
//            'image' => 'required|image|mimes:jpg,jpeg,png',
            'category' => 'required|numeric|exists:categories,id',
            ]);
        if(!$validator->fails()){
            $meal = Meal::find($id);
            foreach (config('app.available_locales') as $local) {
                $meal->translateOrNew($local)->name = $request->get('name_' . $local);
                $meal->translateOrNew($local)->desc = $request->get('desc_' . $local);
            }
            $meal->price = $request->get('price');
            $meal->category_id = $request->get('category');
            $meal->save();
            $meal = $meal->refresh();
            if ($request->hasFile('image')){
                $image = new Image();
                $this->uploadFile($request->file('image'), 'images/meals/', 'public', 'meal_'. $request->file('image')->getBasename() . time());
                $image->path = $this->filePath;
                $meal->image()->save($image);
            }
            $isSaved = $meal->save();
            return response()->json(['message' => $isSaved ? "Meal Updated successfully" : "Failed to Update Meal"], $isSaved ? 200:400);
        }else
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
    }
    public function updateStatus($id){
        $validator = Validator(['id'=>$id], [
            'id' => 'required|numeric|exists:meals,id',
        ]);
        if(!$validator->fails()){
            $meal = Meal::where('id', $id)->first();
            if ($meal->status == '') {
                $meal->status = 'spacial';
                $meal->save();
                return response()->json(['message' => "Meal Added to Spacial"]);
            }else{
                $meal->status = '';
                $meal->save();
                return response()->json(['message' => "Meal removed to Spacial"]);
            }
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
        $isDeleted = Meal::destroy($id);
        return response()->json(['message' => $isDeleted ? "Meal Deleted successfully" : "Failed to Delete Meal"], $isDeleted ? 200:400);
    }
}
