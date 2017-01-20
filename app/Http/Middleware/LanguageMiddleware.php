<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Config;
use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
class LanguageMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }

     public function handle($request, Closure $next)
     {
        // Make sure current locale exists.
         $locale = $request->segment(1);
         if($locale != 'admin') {
             $locales = Config::get('app.locales');
             if (!in_array($locale, $locales) && $locale == 'admin') {
                 $segments[0] = Config::get('app.fallback_locale');
                 return $this->redirector->route($segments[0].'.site.index');
             }
             $this->app->setLocale($locale);
         }
         return $next($request);
     }
}
