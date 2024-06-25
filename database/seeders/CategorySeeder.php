<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $mainCategories = Category::factory()->count(3)->create();

        $mainCategories->each(function ($category) {
            $subCategories = Category::factory()->count(3)->withParent($category->id)->create();

            $subCategories->each(function ($subcategory) {
                Category::factory()->count(2)->withParent($subcategory->id)->create();
            });
        });
    }
}
