<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class VerseDropdown extends Component
{
    public function render(): View
    {
        $base_url = config('bibleapi.base_url');
        $bible_id = auth()->user()->bible_id;
        $chapter = request('chapter_id');

        $verses = Http::withHeaders([
            'api-key' => config('bibleapi.api_key')
        ])->get("{$base_url}/{$bible_id}/chapters/$chapter/verses");

        return view('components.verse-dropdown', [
            'verses' => $verses->json()['data']
        ]);
    }
}
