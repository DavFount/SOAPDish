<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class PagesController extends Controller
{
    public function index() {
        $path = 'storage/bibles/bible_english_tniv.xml';
        $xml = XmlParser::load($path);

        $bible = $xml->parse([
            'book' => ['uses' => 'BIBLEBOOK'],
            'name' => ['uses' => 'BIBLEBOOK::bname'],
            'number' => ['uses' => 'BIBLEBOOK::bnumber']
        ]);

//        dd($bible['book']['CHAPTER']);

        return view('pages.index', [
            'chapters' => $bible
        ]);
    }
}
