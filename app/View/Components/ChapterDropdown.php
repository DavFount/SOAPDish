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
        $bible_id = auth()->user()->bible_id;
        $book = request('book');

        $chapters = Http::withHeaders([
            'api-key' => config('bibleapi.api_key')
        ])->get("{$base_url}/{$bible_id}/books/$book/chapters");

        return view('components.chapter-dropdown', [
            'chapters' => $chapters->json()['data']
        ]);
    }
}
