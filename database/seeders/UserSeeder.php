<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(),
        ]);

        DB::table('user_details')->insert([
            "user_id" => User::where('name' , '=' , 'user')->get()->pluck('id')[0],
            "blood_type" => 'B+',
            "location" => 'Aleppo',
            "phone" => '09123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::random(),
        ]);

        DB::table('user_details')->insert([
            "user_id" => User::where('name' , 'admin')->get()->pluck('id')[0],
            "blood_type" => 'A+',
            "location" => 'Aleppo',
            "phone" => '09123454564',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
