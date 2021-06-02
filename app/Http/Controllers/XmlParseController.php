<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XmlParseController extends Controller
{
    public function index()
    {
        $parser = XmlParser::load('https://news.yandex.ru/army.rss');
        dd($parser);
        dd($parser->parse([
            'news' => [
                'uses'=> 'channel.item[title,link,description]'
            ]
        ]));
    }
}
