<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class BookDropdown extends Component
{
    public function render(): View
    {
        $base_url = config('bibleapi.base_url');
        $books = Http::get("{$base_url}/books");

        return view('components.book-dropdown', [
            'books' => $books->json()
        ]);
    }
}

// https://bible-go-api.rkeplin.com/v1/books
