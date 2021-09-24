<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //
    public function __construct()
    {
//        $this->authorizeResource(Album::class, 'user');
    }

    public function edit(){
        $this->authorize('edit-album');
        $album = Album::first();
        return response()->view('cms.album.edit', ['album' => $album]);
    }

}
