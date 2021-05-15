<?php

namespace Tests\Feature\News;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsItemShowTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_news_is_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $news = News::factory()->create(['category_id' => $category->id]);

        $response = $this->get("/news/{$news->id}");
        $response->assertStatus(200);
    }

    public function test_show_news_with_fake_id_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get("/news/1");
        $response->assertStatus(404);
    }
}
