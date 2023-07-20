<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		if (Auth::check()) {
			if (Auth::user()->role == 'admin') {
				return $next($request);
			} else {
				Alert::error('Sorry', 'You have no access this page');
				return redirect()->back();
			}
		} else {
			return redirect()->route('admin.login');
		}
	}
}
