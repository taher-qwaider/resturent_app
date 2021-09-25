<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Event;
use App\Models\Meal;
use App\Models\Review;
use App\Models\Setting;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //

    public function index(){
        $about_us =Setting::where('subject', 'about_us')->get();
        $why_us =Setting::where('subject', 'why_us')->get();
        $categories = Category::all();
        $meals = Meal::all();
        $events = Event::all();
        $reviews = Review::all();
        $album = Album::first();
        $chefs = Chef::all();
        $generals =Setting::where('subject', 'general')->get();
        $social_medias = Setting::where('key', 'socials')->first()->socials;

        return response()->view('app.index', [
            'about_us' => $about_us,
            'why_us' => $why_us,
            'categories' => $categories,
            'meals' => $meals,
            'events' => $events,
            'reviews' => $reviews,
            'album' => $album,
            'chefs' => $chefs,
            'generals' => $generals,
            'social_medias' => $social_medias
        ]);
    }
}
