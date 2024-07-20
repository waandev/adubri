<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'name'           => 'People',
                'created_at'     => Carbon::now('Asia/Makassar'),
                'updated_at'     => Carbon::now('Asia/Makassar'),
            ],
            [
                'name'           => 'Product',
                'created_at'     => Carbon::now('Asia/Makassar'),
                'updated_at'     => Carbon::now('Asia/Makassar'),
            ],
            [
                'name'           => 'E-Channel',
                'created_at'     => Carbon::now('Asia/Makassar'),
                'updated_at'     => Carbon::now('Asia/Makassar'),
            ],
        ];

        Category::insert($category);
    }
}
