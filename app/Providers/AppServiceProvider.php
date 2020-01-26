<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Post;
use App\Rate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $rightSide = Post::orderBy('views','desc')->limit(6)->get(); 
        $menus = Category::all();
        $rates = Rate::all();
        View::share(['menus'=> $menus,'rightSide' => $rightSide,'rates' => $rates]);
    }
}
