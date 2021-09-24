<?php

namespace App\Providers;

use App\Policies\AlbumPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ChefPolicy;
use App\Policies\EventPolicy;
use App\Policies\MealPolicy;
use App\Policies\MessagePolicy;
use App\Policies\ReservationPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\SettingPolicy;
use App\Policies\SocialMediaPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\User' => UserPolicy::class,
         'App\Models\SocialMedia' => SocialMediaPolicy::class,
         'App\Models\Setting' => SettingPolicy::class,
         'App\Models\Review' => ReviewPolicy::class,
         'App\Models\Reservation' => ReservationPolicy::class,
         'App\Models\Message' => MessagePolicy::class,
         'App\Models\Meal' => MealPolicy::class,
         'App\Models\Event' => EventPolicy::class,
         'App\Models\Chef' => ChefPolicy::class,
         'App\Models\Category' => CategoryPolicy::class,
         'App\Models\Album' => AlbumPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
