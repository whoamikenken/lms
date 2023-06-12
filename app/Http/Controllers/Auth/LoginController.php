<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\PersonalDetail;
use App\Models\BusinessDetail;
use Auth;
use App\Notifications\TwoFactorCode;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath(){
      if(auth()->user()->roles()->pluck('id')->implode(', ') == '1'){;  
        return route('admin.dashboard');
      }else if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
        return route('admin.student.welcome');
      }
    }


}
