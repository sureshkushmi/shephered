<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Page;
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
        $pages = Page::where('status', 'active')->get();

    // Build the navLinks array dynamically
    $navLinks = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Tour Packages', 'url' => url('/tour-packages')],
    ];
 foreach ($pages as $page) {
        $navLinks[] = [
            'label' => $page->title,
            'url' => url($page->slug),
        ];
    }

    

    // Share with all views
    View::share('navLinks', $navLinks);
    }
}
