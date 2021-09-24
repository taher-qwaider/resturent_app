<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('cms.dashboard');
})->name('dashboard');

Route::prefix('cms')->middleware('auth:user')->group(function (){
  Route::resource('categories', \App\Http\Controllers\cms\CategoryController::class);
  Route::get('category/list',[\App\Http\Controllers\cms\CategoryController::class, 'getCategories'])->name('category.list');

  Route::resource('meals', \App\Http\Controllers\cms\MealController::class);
  Route::post('meals/{meal}/update', [\App\Http\Controllers\cms\MealController::class, 'update']);
  Route::post('meals/{meal}/updateStatus', [\App\Http\Controllers\cms\MealController::class, 'updateStatus'])->name('updateMealStatus');

  Route::get('meal/list',[\App\Http\Controllers\cms\MealController::class, 'getMeals'])->name('meal.list');
  Route::get('meal/spacial/list',[\App\Http\Controllers\cms\MealController::class, 'getSpacialMeals'])->name('meal.spacial.list');
  Route::get('meal/spacials',[\App\Http\Controllers\cms\MealController::class, 'spacial'])->name('meal.spacial');

  Route::resource('events', \App\Http\Controllers\cms\EventController::class);
  Route::get('event/list',[\App\Http\Controllers\cms\EventController::class, 'getEvents'])->name('event.list');
  Route::post('events/{event}/update', [\App\Http\Controllers\cms\EventController::class, 'update']);

  Route::resource('reservations', \App\Http\Controllers\cms\ReservationController::class);
  Route::get('reservation/list',[\App\Http\Controllers\cms\ReservationController::class, 'getReservations'])->name('reservation.list');

  Route::resource('reviews', \App\Http\Controllers\cms\ReviwController::class);
  Route::get('review/list',[\App\Http\Controllers\cms\ReviwController::class, 'getReviews'])->name('review.list');
  Route::post('reviews/{review}/update', [\App\Http\Controllers\cms\ReviwController::class, 'update']);

  Route::get('album', [\App\Http\Controllers\cms\AlbumController::class, 'edit'])->name('album.edit');
  Route::post('image/store', [\App\Http\Controllers\cms\ImageController::class, 'store'])->name('image.store');
  Route::delete('image/remove', [\App\Http\Controllers\cms\ImageController::class, 'remove'])->name('image.remove');

  Route::resource('chefs', \App\Http\Controllers\cms\ChefController::class);
  Route::get('chef/list',[\App\Http\Controllers\cms\ChefController::class, 'getChefs'])->name('chef.list');
  Route::post('chefs/{chef}/update', [\App\Http\Controllers\cms\ChefController::class, 'update']);

  Route::resource('settings', \App\Http\Controllers\cms\SettingController::class);
  Route::get('setting/{subject}', [\App\Http\Controllers\cms\SettingController::class, 'index'])->name('settings.subject.index');
  Route::get('setting/{subject}/list',[\App\Http\Controllers\cms\SettingController::class, 'getSettings'])->name('settings.list');

  Route::resource('messages', \App\Http\Controllers\cms\MessageController::class);
  Route::get('message/list',[\App\Http\Controllers\cms\MessageController::class, 'getMessages'])->name('messages.list');

  Route::resource('socialMedias', \App\Http\Controllers\cms\SocialMediaController::class);
  Route::get('socialMedia/list',[\App\Http\Controllers\cms\SocialMediaController::class, 'getSocialMedia'])->name('socialMedias.list');

  Route::resource('users', \App\Http\Controllers\cms\UserController::class);
  Route::get('user/list',[\App\Http\Controllers\cms\UserController::class, 'getUsers'])->name('users.list');
  Route::post('users/{user}/update', [\App\Http\Controllers\cms\UserController::class, 'update']);
  Route::get('user/{user}/permissions',[\App\Http\Controllers\cms\spatie\UserPermissionController::class, 'index']);
  Route::post('user/{user}/permissions',[\App\Http\Controllers\cms\spatie\UserPermissionController::class, 'store']);
  Route::get('user/{user}/roles',[\App\Http\Controllers\cms\spatie\UserRoleController::class, 'index']);
  Route::post('user/{user}/roles',[\App\Http\Controllers\cms\spatie\UserRoleController::class, 'store']);

  Route::get('logout', [\App\Http\Controllers\cms\auth\AuthController::class, 'logout'])->name('logout');

  Route::resource('permissions', \App\Http\Controllers\cms\spatie\PermissionController::class);
  Route::get('permission/list',[\App\Http\Controllers\cms\spatie\PermissionController::class, 'getPermissions'])->name('permissions.list');

  Route::resource('roles', \App\Http\Controllers\cms\spatie\RoleController::class);
  Route::get('role/list',[\App\Http\Controllers\cms\spatie\RoleController::class, 'getRoles'])->name('roles.list');

  Route::get('role/{role}/permissions',[\App\Http\Controllers\cms\spatie\RolePermissionController::class, 'index']);
  Route::post('role/{role}/permissions',[\App\Http\Controllers\cms\spatie\RolePermissionController::class, 'store']);


});
Route::prefix('cms')->middleware('guest')->group(function (){
   Route::get('login', [\App\Http\Controllers\cms\auth\AuthController::class, 'getView'])->name('login.view');
   Route::post('login', [\App\Http\Controllers\cms\auth\AuthController::class, 'login']);
});
