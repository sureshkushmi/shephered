<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
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
        View::share('navLinks', [
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'About', 'url' => url('/about')],
            ['label' => 'Services', 'url' => url('/services')],
            ['label' => 'Tour Packages', 'url' => url('/packages')],
            [
                'label' => 'Pages', 'dropdown' => [
                    ['label' => 'Blog Grid', 'url' => url('/blog')],
                    ['label' => 'Blog Detail', 'url' => url('/single')],
                    ['label' => 'Destination', 'url' => url('/destination')],
                    ['label' => 'Travel Guides', 'url' => url('/guide')],
                    ['label' => 'Testimonial', 'url' => url('/testimonial')],
                ]
            ],
            ['label' => 'Contact', 'url' => url('/contact')],
        ]);
    }
}
