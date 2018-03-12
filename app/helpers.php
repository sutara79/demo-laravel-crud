<?php
if (! function_exists('my_is_current_controller')) {
    /**
     * 現在のコントローラ名が、複数の名前のどれかに一致するかどうかを判別する
     *
     * @param string $names カンマ区切りされた複数のコントローラ名
     * @return bool
     */
    function my_is_current_controller($names)
    {
        $names = array_map('trim', explode(',', $names));
        $current = explode('.', Route::currentRouteName())[0];
        return in_array($current, $names, true);
    }
}

if (! function_exists('my_locale_url')) {
    /**
     * Get URL to change locale using App\Http\Middleware\CheckLocale.
     *
     * @param string $locale
     * @return string
     */
    function my_locale_url($locale)
    {
        // Parse URL
        $urlParsed = parse_url(Request::fullUrl());
        if (isset($urlParsed['query'])) {
            parse_str($urlParsed['query'], $params);
        }
        // Set locale to params
        $params['lang'] = $locale;
        // Build query
        $paramsJoined = [];
        foreach($params as $param => $value) {
           $paramsJoined[] = "$param=$value";
        }
        $query = implode('&', $paramsJoined);
        // Build URL
        $url = (App::environment('production') ? 'https' : $urlParsed['scheme']).'://'.
               // No necessity to deal with "user" and "pass".
               $urlParsed['host'].
               (isset($urlParsed['port']) ? ':'.$urlParsed['port'] : '').
               (isset($urlParsed['path']) ? $urlParsed['path'] : '/').
               '?'.$query.
               (isset($urlParsed['fragment']) ? '#'.$urlParsed['fragment'] : '');
        return $url;
    }
}