<div>
    <x-input-label for="language">Language</x-input-label>
    <select id="language" name="language"
        {{ $attributes->merge(['class' => 'bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-gray-500 focus:outline-none focus:ring-gray-500 sm:text-sm']) }}>
        @foreach($languages as $name => $language)
            <option value="{{ $language }}"
                    class="hover:bg-gray-100"
                 @if(old('language'))
                {{ old('language') == $language ? 'selected' : '' }}
                @else
                {{ auth()->user()->language == $language ? 'selected' : '' }}
                @endif
            >{{ $name }}</option>
        @endforeach
    </select>
</div>
