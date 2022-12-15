<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $user = user::where('UserId', $request->username)->first();
        if($user)
        {
            if($user)
            {
                if(self::is_exsits_domain($request->username,$request->password))
                {
                    Auth::loginUsingId($user->id);
                    return redirect('/welcome');
                }
                else {
                    session()->flash('status_warning','Username หรือ Password ไม่ถูกต้อง / Username in domain is locked');
                    return redirect()->back()->withInput();
                }

            }
        }
        else
        {
            session()->flash('status_warning','Username นี้ไม่มีสิทธิ์เข้าใช้งาน');
            return redirect()->back()->withInput();
        }
    }


    public function is_exsits_domain($userid,$password)
    {
        $status = 0;
        $message_error = "";
        $ldap_Server = 'deestonegrp.com';
        $domain_login = 'deestonegrp' . "\\" . 'webmaster';
        $domain_pw = 'Webma$ter!';
        $ldap_port = '389';

        $ldap_connect = @ldap_connect($ldap_Server,$ldap_port);
        if (!$ldap_connect) {
            $message_error = 'Cannot Connect to LDAP server';
            die('Cannot Connect to LDAP server');
        }
        else{
            $user_ad = 'deestonegrp' . "\\" . $userid;
            $ldap_bind = @ldap_bind($ldap_connect,$user_ad,$password);
        }
        if($ldap_bind) return true;
        return false;

    }
}
