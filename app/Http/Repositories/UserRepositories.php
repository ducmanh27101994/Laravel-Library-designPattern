<?php


namespace App\Http\Repositories;


use App\User;
use Illuminate\Support\Facades\DB;

class UserRepositories
{
    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    function save($user){
        $user->save();
    }

    function login(){
        return DB::table('users')->select('*')->where('email','password')->get();

    }
}
