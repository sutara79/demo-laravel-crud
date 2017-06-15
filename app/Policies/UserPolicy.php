<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Admin can do everything.
     * See http://qiita.com/inaka_phper/items/09e730bf5a0abeb9e51a
     *
     * @param $user
     * @param $ability
     * @return mixed
     */
    public function before($user, $ability)
    {
        return $user->isAdmin() ? true : null;
    }

    /**
     * Determine whether the user can update or delete the post.
     *
     * @param  \App\User  $userAuth
     * @param  \App\User  $userPage
     * @return mixed
     */
    public function edit(User $userAuth, User $userPage)
    {
        return $userAuth->id == $userPage->id;
    }
}
