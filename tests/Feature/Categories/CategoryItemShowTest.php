<?php

namespace Tests\Feature\Categories;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryItemShowTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_category_is_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $response = $this->get("/categories/{$category->id}");
        $response->assertStatus(200);
    }

    public function test_show_category_with_fake_id_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get("/categories/1");
        $response->assertStatus(404);
    }
}
