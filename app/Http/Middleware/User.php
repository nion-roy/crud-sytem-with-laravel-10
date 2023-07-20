<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class User
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		if (Auth::check()) {
			if (Auth::user()->role == 'user') {
				return $next($request);
			} else {
				Alert::error('Sorry', 'You have not Access this page!');
				return redirect()->back();
			}
		} else {
			return redirect()->route('login');
		}
	}
}
