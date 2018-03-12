<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 管理者には全ての行動を認可する。
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
     * 編集と削除の認可を判断する。
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
