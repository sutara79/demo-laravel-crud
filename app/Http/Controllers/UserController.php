<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * コントローラのテスト
     */
    public function foo()
    {
        // SQL -> https://laravel.com/docs/5.4/database
        // $users = DB::select('select * from users where id = ?', [1]);
        // return view('user.foo', ['name' => json_encode($users)]);
        // return view('user.foo', ['name' => $users[0]->name]);

        // Query Builder -> https://laravel.com/docs/5.4/queries
        $user = DB::table('users')->where('id', 1)->first();
        // return view('user.foo', ['name' => $user->name]);
        return view('user.foo', [
            'path' => database_path(),
            'name' => User::findOrFail(1)]
        );
    }

    /**
     * Show all users.
     *
     * @return Response
     */
    public function all()
    {
        $users = User::all();
        return view('user.all', [
            'title' => 'User',
            'users' => $users
        ]);
    }

    /**
     * Show specific user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', [
            'title' => 'Detail: ' . $user->name,
            'user' => $user
        ]);
    }
}