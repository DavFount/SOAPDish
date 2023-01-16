<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class ChapterDropdown extends Component
{
    public function render(): View
    {
        $base_url = config('bibleapi.base_url');
        $book = request('book');

        $chapters = Http::get("{$base_url}/books/$book/chapters");

        return view('components.chapter-dropdown', [
            'chapters' => $chapters->json()
        ]);
    }
}

// http://localhost:8084/books/[BookID]/chapters/[ChapterID]
