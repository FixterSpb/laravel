<?php

namespace Tests\Feature\News;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsIndexTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news_index_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/news');

        $response->assertStatus(200);
    }
}
