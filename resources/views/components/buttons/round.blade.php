@props(['route', 'title'])

<a href="{{ $route ?? "#" }}"
   class="block w-12 h-12 rounded-full bg-green-600 text-center font-bold text-3xl shadow-md leading-12 text-yellow-200
            hover:bg-green-500 hover:text-yellow-300"
   title="{{ $title ?? '' }}"
>
    {{ $slot }}
</a>

