<?php

namespace Tests\Feature\About;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutIndexTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_about_index_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}
