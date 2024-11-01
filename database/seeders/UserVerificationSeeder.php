<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserVerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);

        UserVerification::create(
            [
                'user_id' => $user->id,
                'is_verified' => 1,
            ]
        );
    }
}
