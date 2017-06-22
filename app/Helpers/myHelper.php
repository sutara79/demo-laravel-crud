<?php
if (! function_exists('urlChangeLocale')) {
    /**
     * Get URL to change locale using App\Http\Middleware\CheckLocale.
     *
     * @param string $locale
     * @return string
     */
    function urlChangeLocale($locale)
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
        $url = ((!App::environment('local')) ? 'https' : $urlParsed['scheme']) . '://' .
               $urlParsed['host'] .
               ((isset($urlParsed['path'])) ? $urlParsed['path'] : '') .
               '?' . $query;

        return $url;
    }
}

if (! function_exists('isCurrentController')) {
    /**
     * Check if the current controller's name matches given string.
     *
     * @param string $names Comma separated controller's name
     * @return bool
     */
    function isCurrentController($names)
    {
        $names = array_map('trim', explode(',', $names));
        $current = explode('.', Route::currentRouteName())[0];
        return in_array($current, $names, true);
    }
}