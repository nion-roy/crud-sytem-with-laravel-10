<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseEnroll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$corses = Course::latest()->get();
		$corsesenroll = CourseEnroll::latest()->get();
		return view('admin.dashboard', compact('user', 'corses', 'corsesenroll'));
	}

	public function admin()
	{
		return view('admin.login');
	}

	/**
	 * Destroy an authenticated session.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		Auth::guard('web')->logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		Alert::success('Success', 'Admin Logout Successfully');
		return redirect()->route('admin.login');
	}
}
