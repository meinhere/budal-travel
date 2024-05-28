<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Login;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Gate::define('admin', fn (Login $login, Role $role) => $role->nama_role === "Admin");

        // Gate::define('tour', fn (Login $login, Role $role) => $role->nama_role === "Tour Leader");
    }
}
