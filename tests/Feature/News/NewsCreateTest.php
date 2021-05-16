<?php

namespace Tests\Feature\News;

use App\Models\Category;
use App\Models\Source;
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
    private function register(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    private function getCategory(): Category
    {
        return Category::factory()->create();
    }

    private function getSource(): Source
    {
        return Source::factory()->create();
    }
    public function test_create_news_success()
    {
        $this->register();

        $response = $this->post('/news/create', [
            'title' => 'Title',
            'description' => 'Description',
            'category' => $this->getCategory()->id,
            'source' => $this->getSource()->id
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $response->assertRedirect('/news');
    }

    public function test_create_news_with_empty_all_fields_is_invalid()
    {
        $this->register();

        $response = $this->post('/news/create', [
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['category', 'title', 'source', 'description']);
    }

    public function test_create_news_with_fake_category_and_source_is_invalid()
    {
        $this->register();

        $response = $this->post('/news/create', [
            'title' => 'Title',
            'description' => 'Description',
            'category' => 30,
            'source' => 15,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['category', 'source']);
    }

   public function test_create_news_with_too_short_title_and_description_is_invalid()
    {
        $this->register();

        $response = $this->post('/news/create', [
            'title' => 'ab',
            'description' => 'De',
            'category' => $this->getCategory()->id,
            'source' => $this->getSource()->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title', 'description']);
    }

    public function test_create_news_with_too_long_title_is_invalid()
    {
        $this->register();

        $response = $this->post('/news/create', [
            'title' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты). ',
            'description' => 'Description',
            'category' => $this->getCategory()->id,
            'source' => $this->getSource()->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_create_news_with_spaces_title_and_description_is_invalid()
    {
        $this->register();

        $response = $this->post('/news/create', [
            'title' => ' ab ',
            'description' => ' de ',
            'category' => $this->getCategory()->id,
            'source' => $this->getSource()->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title', 'description']);
    }

}
