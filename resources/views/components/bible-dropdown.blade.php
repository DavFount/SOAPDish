<div>
    <x-input-label for="bible">Bible</x-input-label>
    {{--    @if (count($bibles) > 1)--}}
    <select id="bible" name="bible"
        {{ $attributes->merge(['class' => 'bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-gray-500 focus:outline-none focus:ring-gray-500 sm:text-sm']) }}>
        @foreach($bibles as $bible)
            @if(auth()->user()->bible_id == null)
                <option value="" selected disabled hidden>Select a bible translation</option>
            @endif
            <option value="{{ $bible['abbreviation'] }}"
                    class="hover:bg-gray-100"
            @if(old('bible'))
                {{ old('bible') == $bible['abbreviation'] ? 'selected' : '' }}
                @else
                {{ auth()->user()->bible_id == $bible['abbreviation'] ? 'selected' : '' }}
                @endif
            >{{ $bible['version'] }}</option>
        @endforeach
    </select>
    {{--    @else--}}
    {{--        <span class="text-red-900 dark:text-red-200 text-xs">Bibles with the selected language could not be found.</span>--}}
    {{--    @endif--}}
</div>
