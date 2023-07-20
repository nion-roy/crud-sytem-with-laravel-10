<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTable extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		DB::table('users')->insert([
			[
				// Admin seeder
				'name'			=> 'Admin',
				'email'			=> 'admin@gmail.com',
				'role'			=> 'admin',
				'password'	=> Hash::make('12345678'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			],
			[
				// User seeder
				'name'		=> 'User',
				'email'		=> 'user@gmail.com',
				'role'		=> 'user',
				'password'	=> Hash::make('12345678'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			],
		]);
	}
}
