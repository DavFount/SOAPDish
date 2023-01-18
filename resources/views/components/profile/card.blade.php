@props(['name', 'title', 'bio', 'joined', 'path', 'status'])

@php
    $classes = 'py-1 px-2 rounded text-white text-sm';
    if ($status) {
        $classes .= ' bg-green-900';
        $message = 'Active';
    }
    else {
        $classes .= ' bg-red-900';
        $message = 'In-Active';
    }
@endphp

<div class="bg-gray-100 dark:bg-gray-800 p-3 shadow-sm rounded-xl border-t-4 border-gray-400 dark:border-gray-700 custom-shadow">
    <div class="image overflow-hidden">
        <img class="h-auto w-full mx-auto rounded-lg border border-black"
             src="{{ $path }}"
             alt="{{ $name }}">
    </div>
    <h1 class="text-gray-900 dark:text-gray-300 font-bold text-xl leading-8 my-1">{{ $name }}</h1>
    <h3 class="text-gray-600 dark:text-gray-400 font-lg text-semibold leading-6">{{ $title }}</h3>
    <p class="text-sm text-gray-500 dark:text-gray-500 hover:text-gray-600 leading-6">
        {{ $bio }}
    </p>
    <ul
        class="bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400 py-2 px-3 mt-3 divide-y divide-gray-500 rounded-xl shadow-sm border border-gray-700 dark:border-gray-700">
        <li class="flex items-center py-3">
            <span>Status</span>
            <span class="ml-auto"><span
                    class="{{ $classes }}">{{ $message }}</span></span>
        </li>
        <li class="flex items-center py-3">
            <span>Member since</span>
            <span class="ml-auto">{{ $joined }}</span>
        </li>
    </ul>
</div>
