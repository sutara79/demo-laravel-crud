<?php
namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckLocale
{
    /** @var array Langueges this app deal with. */
    private $langs = ['ja', 'en'];

    /**
     * Set locale from session or config.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = '';
        if (isset($_GET['lang'])) {
            // Get locale from GET parameter.
            $locale = $_GET['lang'];
        }
        else {
            // Get locale from session.
            $locale = session('locale');
            // If session does not exist, get Accept-Language of browser.
            if (!$locale && isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                $locale = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
                $locale = substr($locale, 0, 2);
            }
        }
        // Check if this app can deal with $locale.
        if (!in_array($locale, $this->langs, true)) {
            $locale = config('app.fallback_locale');
        }
        // Save locale to session.
        session(['locale' => $locale]);
        \App::setLocale($locale);
        return $next($request);
    }
}