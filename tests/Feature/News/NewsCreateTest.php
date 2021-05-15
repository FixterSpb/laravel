<?php

namespace Tests\Feature\News;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create_news_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'Title',
            'description' => 'Description',
            'category' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $response->assertRedirect('/news');
    }

    public function test_create_news_with_empty_category_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/news/create', [
            'name' => 'Title',
            'description' => 'Description',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['category']);
    }

    public function test_create_news_with_fake_category_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/news/create', [
            'title' => 'Title',
            'description' => 'Description',
            'category' => 30,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['category']);
    }

    public function test_create_news_with_empty_title_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'description' => 'Description',
            'category' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_create_news_with_too_short_title_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'ab',
            'description' => 'Description',
            'category' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_create_news_with_too_long_title_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты). ',
            'description' => 'Description',
            'category' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_create_news_with_spaces_title_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => ' ab ',
            'description' => 'Description',
            'category' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_create_news_with_empty_description_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'Title',
            'category' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description']);
    }

    public function test_create_news_with_too_short_description_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'Title',
            'description' => 'De',
            'category' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description']);
    }

    public function test_create_news_with_spaces_description_is_invalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'Title',
            'description' => '    ',
            'category' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description']);
    }
}
