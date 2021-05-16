<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $categories = Category::factory(5)->create();
//        $sources = Source::factory(5)->create();
//
//        foreach ($categories as $category)
//        {
//            foreach ($sources as $source)
//            {
//                News::factory(10,
//                    [
//                        'category_id' => $category->id,
//                        'source_id' => $source->id,
//                    ])
//                    ->create();
//            }
//        }

        $sources = Source::factory(10)->create();

        Category::factory(10)
            ->create()
            ->each(function ($category) use ($sources) {
                News::factory(10,
                    [
                        'category_id' => $category->id,
                        'source_id' => $sources[rand(0, count($sources) - 1)]->id,
                    ])
                    ->create();
            });
    }
}
