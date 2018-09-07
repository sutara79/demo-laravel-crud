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