<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

class AppServiceProvider extends ServiceProvider
{
    private $service;
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->service = new TheMovieDatabaseService();
        $genres = $this->service
             ->movieGenreList()
             ->get();

        view()->share('genres', $genres);

    }
}
