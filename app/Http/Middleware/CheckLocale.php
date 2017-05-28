<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocale
{
    /**
     * Set locale from session or config.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get locale from session.
        $locale = session('locale');

        // If session does not exist,
        // get Accept-Language of browser.
        if (!$locale) {
            $locale = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
            $locale = substr($locale, 0, 2);
            session(['locale' => $locale]);
        }

        \App::setLocale($locale);
        return $next($request);
    }
}
