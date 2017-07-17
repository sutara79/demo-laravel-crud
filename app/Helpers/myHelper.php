<?php
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

if (! function_exists('my_is_current_controller')) {
    /**
     * Check if the current controller's name matches given string.
     *
     * @param string $names Comma separated controller's name
     * @return bool
     */
    function my_is_current_controller($names)
    {
        $names = array_map('trim', explode(',', $names));
        $current = explode('.', Route::currentRouteName())[0];
        return in_array($current, $names, true);
    }
}

/** @todo Complete this function */
if (! function_exists('my_date')) {
    /**
     * Get datetime of user's timezone.
     *
     * @param string $date
     * @return string
     */
    function my_date($date)
    {
        // Create DateTime object
        $t = new DateTime($date, new DateTimeZone('UTC'));

        // Get user's timezone
        /** @todo Complete getting user's timezone */
        $timezone = 'Asia/Tokyo';

        // Return date
        $t->setTimeZone(new DateTimeZone($timezone));
        return $t->format(__('Y-m-d H:i:s'));
    }
}