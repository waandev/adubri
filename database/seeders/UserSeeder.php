<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'           => 'Super Admin',
                'email'          => 'admin@brita3813.com',
                'password'       => Hash::make('S^%r5v2E9pZb'),
                'remember_token' => null,
                'created_at'     => Carbon::now('Asia/Makassar'),
                'updated_at'     => Carbon::now('Asia/Makassar'),
            ],
        ];

        User::insert($user);
    }
}
