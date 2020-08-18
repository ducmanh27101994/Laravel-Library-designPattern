<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepositories;
use App\Http\Requests\RequestRegister;
use App\User;
use Illuminate\Http\Request;

class UserServices
{
    protected $userRepo;

    function __construct(UserRepositories $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    function store(RequestRegister $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $this->userRepo->save($user);
    }


}
