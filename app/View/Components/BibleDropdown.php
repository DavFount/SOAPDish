<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class BibleDropdown extends Component
{
    public function render(): View
    {
        $bibles = Http::withHeaders([
            'api-key' => config('bibleapi.api_key')
        ])->get(config('bibleapi.base_url'), [
            'language' => auth()->user()->language
        ]);

        return view('components.bible-dropdown', [
            'bibles' => $bibles->json()['data']
        ]);
    }
}
