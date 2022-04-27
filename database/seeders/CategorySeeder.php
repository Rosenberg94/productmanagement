<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'drinks',
            'parent' => null,
        ]);
        Category::create([
            'id' => 2,
            'name' => 'alcohol drinks',
            'parent' => 1,
        ]);
        Category::create([
            'id' => 3,
            'name' => 'non-alcohol drinks',
            'parent' => 1,
        ]);
        Category::create([
            'id' => 4,
            'name' => 'cheese',
            'parent' => null,
        ]);
        Category::create([
            'id' => 5,
            'name' => 'soft cheese',
            'parent' => 4,
        ]);
        Category::create([
            'id' => 6,
            'name' => 'hard cheese',
            'parent' => 4,
        ]);
    }
}
