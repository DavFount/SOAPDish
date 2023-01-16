@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-gray-200 focus:bg-blue-500 hover:text-gray-900 focus:text-white';
    if($active) $classes .= ' bg-gray-200 text-white';
@endphp

<a {{$attributes(['class' => $classes])}}>{{ $slot }}</a>
