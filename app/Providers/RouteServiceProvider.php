<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = explode('/', $_SERVER['REQUEST_URI']);
            $languages = [
                'fr' => 'fr',
                'ar' => 'ar',
                'en' => 'en'
            ];
            if (in_array($url[1], $languages)) {
                $localisation = $languages[$url[1]];
            } else {
                $localisation = App::getLocale();
            }
            if (!Cookie::get('localisation') || $localisation != Cookie::get('localisation')) {
                return redirect($_SERVER['REQUEST_URI'])->withCookie(cookie('localisation', $localisation, 10))->send();
            }
            App::setLocale(Cookie::get('localisation'));
    //        dd(App::getLocale());
        }
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
