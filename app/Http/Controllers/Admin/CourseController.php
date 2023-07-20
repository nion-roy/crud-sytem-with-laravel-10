<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$courses = Course::latest()->get();
		return view('admin.course.index', compact('courses'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.course.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name'				=> 'required|unique:courses',
			'sit'					=> 'required',
			'description' => 'required',
			'image'				=> 'mimes:png,jpg,jpeg|image|max:3072',
		]);

		// return $request;

		$image = $request->file('image');
		$slug = Str::slug($request->name);

		if (isset($image)) {
			$imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

			if (!Storage::disk('public')->exists('course')) {
				Storage::disk('public')->makeDirectory('course');
			}

			$setImage = Image::make($image)->resize(730, 480)->stream();
			Storage::disk('public')->put('course/' . $imageName, $setImage);
		} else {
			$imageName = 'default.png';
		}

		Course::create([
			'name'			=> $request->name,
			'slug'			=> $slug,
			'sit'				=> $request->sit,
			'description'	=> $request->description,
			'image'			=> $imageName,
		]);

		Toastr::success('Your Course Successful Added', 'Success');
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
		$course = Course::findOrFail($id);
		return view('admin.course.edit', compact('course'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		$this->validate($request, [
			'name'				=> 'required',
			'sit'					=> 'required',
			'description' => 'required',
			'image'				=> 'mimes:png,jpg,jpeg|image|max:3072',
		]);

		// return $request;

		$course = Course::findOrFail($id);
		$image = $request->file('image');
		$slug = Str::slug($request->name);

		if (isset($image)) {
			$imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

			if (!Storage::disk('public')->exists('course')) {
				Storage::disk('public')->makeDirectory('course');
			}

			if (!Storage::disk('public')->exists('course/' . $course->image)) {
				Storage::disk('public')->delete('course/' . $course->image);
			}

			$setImage = Image::make($image)->resize(730, 480)->stream();
			Storage::disk('public')->put('course/' . $imageName, $setImage);
		} else {
			$imageName = $course->image;
		}

		$course->update([
			'name'			=> $request->name,
			'slug'			=> $slug,
			'sit'				=> $request->sit,
			'description'	=> $request->description,
			'image'			=> $imageName,
		]);

		Toastr::success('Your Course Successful Updated', 'Success');
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$course = Course::findOrFail($id);

		if (Storage::disk('public')->exists('course/' . $course->image)) {
			Storage::disk('public')->makeDirectory('course/' . $course->image);
		}

		$course->delete();
		Toastr::success('Your Course Successful Delete', 'Success');
		return redirect()->back();
	}
}
