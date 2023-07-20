<?php

namespace App\Http\Controllers\User;

use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CourseEnrollController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$enrolles = Auth::user()->courses()->latest()->get();
		// $enrolles = CourseEnroll::latest()->get();
		return view('user.enroll.index', compact('enrolles'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name'			=> 'required',
			'email'			=> 'required|email',
			'contact'		=> 'required|min:11|max:11',
			'payment'		=> 'required',
			'transaction'	=> 'required'
		]);

		// return $request;

		CourseEnroll::create([
			'user_id'			=> Auth::user()->id,
			'course_id'		=> $request->course_id,
			'name'				=> $request->name,
			'email'				=> $request->email,
			'contact'			=> $request->contact,
			'payment'			=> $request->payment,
			'transaction'	=> $request->transaction
		]);

		Toastr::success('Successfully Add Your Course', 'Success');
		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
