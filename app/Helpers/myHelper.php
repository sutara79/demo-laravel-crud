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