<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //
    public function edit(){
        $album = Album::first();
        return response()->view('cms.album.edit', ['album' => $album]);
    }

}
