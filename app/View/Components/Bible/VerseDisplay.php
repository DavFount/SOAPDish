<?php

namespace App\View\Components\Bible;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VerseDisplay extends Component
{
    public function render(): View
    {
        
        return view('components.bible.verse-display');
    }
}
