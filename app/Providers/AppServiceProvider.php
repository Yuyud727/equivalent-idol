<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SocialMedia;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Share social media ke semua views
        View::composer('*', function ($view) {
            $view->with('globalSocialMedia', SocialMedia::active()->ordered()->get());
        });
    }
}