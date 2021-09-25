<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    //

    public function setLocal($locale){
//        dump($locale);
        App::setLocale($locale);
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
