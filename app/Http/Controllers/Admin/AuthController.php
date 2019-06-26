<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AuthController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = 'admin/cards';

	public function username()
	{
		return 'name';
	}

    public function showLogin()
    {
    	return view('admin.auth.login');
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect()->route('cards.index');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function getFailedLoginMessage()
    {
        return '用户名或密码错误';
    }
}
