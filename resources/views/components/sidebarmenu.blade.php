@props([
    'title' => 'Menu',
    'href' => '#',
])
<a href="{{ $href }}"
    class="inline-flex items-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg px-2"
    :class="{ 'justify-start': menu, 'justify-center': menu == false }">
    {{ $slot }}
    <span class="ml-2" x-show="menu">{{ $title }}</span>
</a>
