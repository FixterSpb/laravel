<?php

namespace Tests\Feature\Order;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_order_create_is_success()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/order/create', [
            'name' => 'Alex',
            'phone' => '+7 (999) 999-9999',
            'email' => 'alex@localhost.test',
            'description' => 'Description',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('success');
    }

    public function test_order_create_with_empty_name_and_description_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/order/create', [

            'phone' => '+7 (999) 999-9999',
            'email' => 'alex@localhost.test',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'description']);
    }

    public function test_order_create_with_too_short_name_and_description_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/order/create', [
            'name' => 'Al',
            'phone' => '+7 (999) 999-9999',
            'email' => 'alex@localhost.test',
            'description' => 'De',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'description']);
    }

    public function test_order_create_with_too_long_name_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/order/create', [
            'name' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).',
            'phone' => '+7 (999) 999-9999',
            'email' => 'alex@localhost.test',
            'description' => 'Description',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_order_create_with_spaces_name_and_description_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/order/create', [
            'name' => '    ',
            'phone' => '+7 (999) 999-9999',
            'email' => 'alex@localhost.test',
            'description' => '    ',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'description']);
    }

    public function test_order_create_with_invalid_phone_and_email_is_error()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/order/create', [
            'name' => 'Alex',
            'phone' => '+7 (999)',
            'email' => 'alexlocalhost.test',
            'description' => 'Description',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['phone', 'email']);
    }
}
