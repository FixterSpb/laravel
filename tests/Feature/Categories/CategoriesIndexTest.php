<?php

namespace Tests\Feature\Categories;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriesIndexTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categories_index_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/categories');

        $response->assertStatus(200);
    }
}
