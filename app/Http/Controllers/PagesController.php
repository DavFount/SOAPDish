<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class PagesController extends Controller
{
    public function index() {

        return view('pages.index');
    }
}
