@props(['news'])

<div class="bg-blue-200 shadow-md rounded-lg m-1">

    <a  href="{{ route('categories.show', ['category' => $news->category]) }}"
        class="block bg-green-200 uppercase p-2 rounded-lg rounded-b-none hover:bg-green-300 font-semibold"
    >{{ $news->category->title }}</a>

{{--    {{ $news->category }}--}}

    <a class="block hover:bg-blue-300 p-4 rounded-lg rounded-t-none" href="{{ route('news.show', compact('news')) }}">
        <p class="font-bold">{{ $news->title }}</p>
        <p>{{ $news->created_at->format('d.m.Y') }}</p>
    </a>
</div>
