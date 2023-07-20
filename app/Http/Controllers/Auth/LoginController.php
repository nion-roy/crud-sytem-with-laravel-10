<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
	protected $redirectTo;

	protected function redirectTo()
	{
		if (Auth::check()) {
			if (auth()->user()->role == 'admin') {
				// Toastr::success('Admin Login Successfully', 'Success');
				Alert::success('Success', 'Wellcome to Admin Dashboard');
				return '/admin/dashboard';
			} elseif (auth()->user()->role == 'user') {
				// Toastr::success('User Login Successfully', 'Success');
				Alert::success('Success', 'Wellcome to User Dashboard');
				return '/user/dashboard';
			} else {
				return redirect()->back();
			}
		} else {
			return redirect()->back();
		}
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
}
