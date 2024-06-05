<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    //Anything included in this function is available anywhere in the app
    public function boot(): void
    {
        Model::preventLazyLoading();

        // FIRST OPTION FOR AUTHORIZATION: Gate::define('edit-job', function (User $user, Job $job){
        //     return $job->employer->user->is($user);
        // });
    }
}
