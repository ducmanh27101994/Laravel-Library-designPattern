<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRegister;
use App\Http\Services\UserServices;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    protected $userServices;

    function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    function create()
    {
        return view('logins.register');
    }

    function store(RequestRegister $request)
    {
        $this->userServices->store($request);
        return redirect()->route('logins.create');
    }

    function createLogin()
    {
        return view('logins.login');
    }

    function storeLogin(Request $request)
    {
//        $email = $request->email;
//        $password = $request->password;

//        $getUser = DB::table('users')->where('email','=',$request->email, 'and');
        $getUser = DB::table('users')->select('*')->where([
            ['email', '=', $request->email],
            ['password', '=', $request->password]
        ])->get();

        foreach ($getUser as $key => $user) {
            if ($user->email == $request->email && $user->password == $request->password) {
                Session::put('isAuth', true);
                return redirect()->route('students.index');
            }
        }
        return redirect()->route('logins.create');
    }

    function logout()
    {
        Session::remove('isAuth');
        return redirect()->route('logins.create');
    }


}
