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