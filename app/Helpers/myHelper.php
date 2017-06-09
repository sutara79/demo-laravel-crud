<?php
if (! function_exists('isAdmin')) {
    /**
     * Whether the logged in user is admin.
     *
     * @return boolean
     */
    function isAdmin()
    {
        return Auth::id() === Config::get('admin_id');
    }
}

if (! function_exists('isOneselfOrAdmin')) {
    /**
     * Whether the logged in user's ID matches $id, or the logged in user is admin.
     *
     * @param int $id
     * @return boolean
     */
    function isOneselfOrAdmin($id)
    {
        return Auth::id() === $id || Auth::id() === Config::get('admin_id');
    }
}

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
        $url = $urlParsed['scheme'] . '://' .
               $urlParsed['host'] .
               ((isset($urlParsed['path'])) ? $urlParsed['path'] : '') .
               '?' . $query;

        return $url;
    }
}