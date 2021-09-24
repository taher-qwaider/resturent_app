<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReviwController extends Controller
{
    use FileUpload;

    public function __construct()
    {
//        $this->authorizeResource(Review::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('read-reviews');
        return response()->view('cms.review.index');

    }
    public function getReviews(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Review::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/reviews/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        $this->authorize('create-reviews');
        return response()->view('cms.review.create');
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
//        dd($request->all());
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'profession' => 'required|string|min:3',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if(!$validator->fails()){
            $review = new Review();
            $review->profession = $request->get('profession');
            $review->name = $request->get('name');
            $review->text = $request->get('text');
            $review->save();
            $review = $review->refresh();
            if ($request->hasFile('image')){
                $image = new Image();
                $this->uploadFile($request->file('image'), 'images/reviews/', 'public', 'review_'. $request->file('image')->getBasename() . time());
                $image->path = $this->filePath;
                $review->image()->save($image);
            }
            $isSaved = $review->save();
            return response()->json(['message' => $isSaved ? "Review created successfully" : "Failed to create Review"], $isSaved ? 200:400);
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
        $this->authorize('edit-reviews');
        $review = Review::find($id);
        return response()->view('cms.review.edit', ['review' => $review]);

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
            'profession' => 'required|string|min:3',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if(!$validator->fails()){
            $review = Review::find($id);
            $request->profession = $request->get('profession');
            $review->name = $request->get('name');
            $review->text = $request->get('text');
            $review->save();
            $review = $review->refresh();
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/reviews/', 'public', 'review_'. $request->file('image')->getBasename() . time());
                $review->image->path = $this->filePath;
                $review->image->save();
            }
            $isSaved = $review->save();
            return response()->json(['message' => $isSaved ? "Review updated successfully" : "Failed to update Review"], $isSaved ? 200:400);
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
        $this->authorize('delete-reviews');
        $isDeleted = Review::destroy($id);
        return response()->json(['message' => $isDeleted ? "Review Deleted successfully" : "Failed to Delete Review"], $isDeleted ? 200:400);

    }
}
