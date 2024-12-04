<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_user')->insert([
            'id_user' => 'USR001',
            'nama_user' => 'Malik',
            'description' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Hashing the password
            'role' => 'Admin',
            'photo' => 'user.png',
            'status' => '1',
            'integritas' => '1',
            'read_news' => '1',
            'uniq_id' => null, // Assuming this references an existing user in the users table
        ]);
    }
}