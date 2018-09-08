<?php
if (! function_exists('my_is_current_controller')) {
    /**
     * 現在のコントローラ名が、複数の名前のどれかに一致するかどうかを判別する
     *
     * @param array $names コントローラ名 (可変長引数)
     * @return bool
     */
    function my_is_current_controller(...$names)
    {
        $current = explode('.', Route::currentRouteName())[0];
        return in_array($current, $names, true);
    }
}

if (! function_exists('my_locale_url')) {
    /**
     * 言語切り替え用のURLを生成する
     *
     * @param string $locale 使用言語
     * @return string 言語切り替え用のURL
     */
    function my_locale_url($locale)
    {
        // URLをパースする
        $urlParsed = parse_url(Request::fullUrl());
        if (isset($urlParsed['query'])) {
            parse_str($urlParsed['query'], $params);
        }

        // GETパラメータのlangnの値に引数を格納する
        $params['lang'] = $locale;

        // クエリ部分を整形する
        $paramsJoined = [];
        foreach($params as $param => $value) {
           $paramsJoined[] = "$param=$value";
        }
        $query = implode('&', $paramsJoined);

        // URL全体を整形する
        $url = (App::environment('production') ? 'https' : $urlParsed['scheme']).'://'.
               $urlParsed['host']. // user と pass は扱わない
               (isset($urlParsed['port']) ? ':'.$urlParsed['port'] : '').
               (isset($urlParsed['path']) ? $urlParsed['path'] : '/').
               '?'.$query.
               (isset($urlParsed['fragment']) ? '#'.$urlParsed['fragment'] : '');

        return $url;
    }
}