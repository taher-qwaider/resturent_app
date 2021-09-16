<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    use FileUpload;
    //
    public function store(Request $request){
        $validator =validator($request->all(), [
            'file' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if (!$validator->fails()){
            $image = new Image();
            $this->uploadFile($request->file('file'), 'images/albums/', 'public', 'image_'. $request->file('file')->getBasename() . time());
            $image->path = $this->filePath;
            $isSaved = Album::first()->images()->save($image);
            if($isSaved){
                return response()->json(['message' => 'Image Uploaded Successfully'], 200);
            }
        }else
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
    }
    public function remove(Request $request){
        $id = $request->get('id');
        $image = Image::find($id);
        if(file_exists(storage_path('/app/public/'.$image->path))){
            $isDeleted = Storage::disk('public')->delete($image->path);
            $image->delete();
            return  response()->json(['message' => $isDeleted ? "Image Deleted Successfully": "Failed to Delete Image"], $isDeleted ? 200: 400);
        }else
            return response()->json(['message' => "No Image to Delete"], 400);
    }
}
