<?php

namespace App\View\Components\Bible;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class VerseDisplay extends Component
{
    public function render(): View
    {
        $base_url = config('bibleapi.base_url');
        $book = request('book');
        $chapter = request('chapter');

        $verses = HTTP::get("{$base_url}/books/{$book}/chapters/{$chapter}", [
            'translation' => request('translation') ?? auth()->user()->bible_id
        ]);

        return view('components.bible.verse-display', [
            'verses' => $verses->json()
        ]);
    }
}
