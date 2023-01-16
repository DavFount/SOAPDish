<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class BibleDropdown extends Component
{
    public function render(): View
    {
        $baseUrl = config('bibleapi.base_url');
        $bibles = Http::get("{$baseUrl}/translations");

        return view('components.bible-dropdown', [
            'bibles' => $bibles->json()
        ]);
    }
}
