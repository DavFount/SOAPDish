@props(['mobile' => false])

<x-base.nav-item href="/" :mobile="$mobile" :active="request()->routeIs('home')">Home</x-base.nav-item>
