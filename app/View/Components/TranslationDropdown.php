<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class TranslationDropdown extends Component
{
    public function render(): View
    {
        $base_url = config('bibleapi.base_url');

        $translations = Http::get("{$base_url}/translations");

        return view('components.translation-dropdown', [
            'translations' => $translations->json(),
        ]);
    }
}

// https://bible-go-api.rkeplin.com/v1/translations
