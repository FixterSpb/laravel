<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XmlParseYandexNewsController extends Controller
{
    public function index(String $theme)
    {
        $parser = XmlParser::load("https://news.yandex.ru/${theme}.rss");

        $news = $parser->parse([
            'category' => ['uses' => 'channel.title'],
            'source' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'news' => [
                'uses' => 'channel.item[title,link,description]'
            ]
        ]);

        $category = Category::whereTitle($news['category'])->first();
        $source = Source::whereName($news['source'])->first();

        if(!$category){
            $category = Category::create([
                'title' => $news['category']
            ]);
        }

        if(!$source){
            $source = Source::create([
                'name' => $news['source'],
                'url' => $news['link']
            ]);
        }

        $newsFromDb = News::whereCategoryId($category->id)
                    ->whereSourceId($source->id)
                    ->whereIn(
                        'title',
                        array_map(function($newsItem){
                            return $newsItem['title'];
                        }, $news['news'])
                    )->get();

        $newsToDb = [];

        foreach($news['news'] as $newsItem) {
            if($newsFromDb->where('title', $newsItem['title'])->isNotEmpty()) continue;

            $newsToDb[] = [
                'title' => $newsItem['title'],
                'category_id' => $category->id,
                'source_id' => $source->id,
                'description' => $newsItem['description'],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ];
        }

        News::insert($newsToDb);
        return redirect()->route('categories.show', compact('category'))->with('success', 'Новости успешно загружены');
    }
}
