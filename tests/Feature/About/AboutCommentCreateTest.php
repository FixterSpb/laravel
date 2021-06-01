<?php

namespace Tests\Feature\About;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutCommentCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_about_comment_create_is_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/about-comment/create', [
            'name' => 'Alex',
            'description' => 'Description'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/about');
        $response->assertSessionHas('success');
    }

    public function test_about_comment_create_with_empty_name_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/about-comment/create', [
            'description' => 'Description'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_about_comment_create_with_too_short_name_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/about-comment/create', [
            'name' => 'na',
            'description' => 'Description'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_about_comment_create_with_too_long_name_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/about-comment/create', [
            'name' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).',
            'description' => 'Description'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_about_comment_create_with_spaces_name_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/about-comment/create', [
            'name' => '    ',
            'description' => 'Description'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_about_comment_create_with_empty_description_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/about-comment/create', [
            'name' => 'Alex',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description']);
    }

    public function test_about_comment_create_with_too_short_description_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/about-comment/create', [
            'name' => 'Alex',
            'description' => 'De'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description']);
    }

    public function test_about_comment_create_with_spaces_description_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/about-comment/create', [
            'name' => 'Alex',
            'description' => '    '
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description']);
    }
}
