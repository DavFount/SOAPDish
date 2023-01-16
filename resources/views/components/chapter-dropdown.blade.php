<div>
    <x-bible.dropdown>
        <x-slot:trigger>
            <button class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-600 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-800 dark:hover:bg-gray-800 dark:text-gray-300 dark:focus:ring-gray-700">
                {{ request('chapter') ? 'Chapter ' . request('chapter') : 'Select a Chapter'  }}
                <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </x-slot:trigger>
{{--        <x-bible.dropdown-item href="/?{{ http_build_query(request()->except('chapter')) }}"--}}
{{--                               :active="request('chapter') === null">All--}}
{{--        </x-bible.dropdown-item>--}}
        @foreach($chapters as $chapter)
            <x-bible.dropdown-item
                href="/?chapter={{  $chapter['number'] }}&chapter_id={{ $chapter['id'] }}&{{ http_build_query(request()->except('chapter', 'chapter_id', 'verse', 'verse_ref')) }}"
                :active="request('chapter_id') === $chapter['id']">
                {{ $chapter['number'] }}
            </x-bible.dropdown-item>
        @endforeach
    </x-bible.dropdown>
</div>
