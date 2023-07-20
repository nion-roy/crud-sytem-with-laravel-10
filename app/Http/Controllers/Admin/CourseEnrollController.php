<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
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
		$enrolles = CourseEnroll::latest()->get();
		return view('admin.enroll.index', compact('enrolles'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$courses = Course::latest()->get();
		return view('admin.enroll.create', compact('courses'));
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


		// $enroll = new CourseEnroll();

		// $enroll->user_id 		= Auth::user()->id;
		// $enroll->name 		= $request->name;
		// $enroll->course_id 		= $request->course_id;
		// $enroll->email 		= $request->email;
		// $enroll->contact 		= $request->contact;
		// $enroll->payment 		= $request->payment;
		// $enroll->transaction 		= $request->transaction;

		// $enroll->save();

		Toastr::success('Successfully Add to User with new Course');
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
		CourseEnroll::findOrFail($id)->delete();
		Toastr::success('Data Delete Successfull');
		return redirect()->back();
	}
}
