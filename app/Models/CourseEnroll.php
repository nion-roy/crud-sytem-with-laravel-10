<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseEnroll extends Model
{
	use HasFactory;
	protected $guarded = [];

	/**
	 * Get the course that owns the CourseEnroll
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function course(): BelongsTo
	{
		return $this->belongsTo(Course::class);
	}


	/**
	 * Get the user associated with the CourseEnroll
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function user(): HasOne
	{
		return $this->hasOne(User::class);
	}
}
