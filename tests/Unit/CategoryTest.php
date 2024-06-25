<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_main_categories(): void
    {
        // Arrange
        $categories = Category::factory()->count(3)->create();

        // Act
        $response = $this->get('/categories');

        // Assert
        $response->assertStatus(200);

        foreach ($categories as $category) {
            $response->assertSee($category->name);
        }
    }

    /** @test */
    public function it_fetches_subcategories_via_ajax(): void
    {
        // Arrange
        $parentCategory = Category::factory()->create();
        $subCategories = Category::factory()->count(3)->withParent($parentCategory->id)->create();

        // Act
        $response = $this->post('/categories/subcategories', ['parent_id' => $parentCategory->id]);

        // Assert
        $response->assertStatus(200);
        $response->assertJsonCount(3);
        foreach ($subCategories as $subCategory) {
            $response->assertJsonFragment(['id' => $subCategory->id, 'name' => $subCategory->name]);
        }
    }
}
