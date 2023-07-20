<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('course_enrolls', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email');
			$table->unsignedBigInteger('course_id');
			$table->unsignedBigInteger('user_id');
			$table->integer('contact');
			$table->string('payment');
			$table->string('transaction');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('course_enrolls');
	}
};
