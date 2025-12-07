<x-layout title="Blog">
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>By {{ $post->author }}</p>
        <div>{{ $post->body }}</div>
    @endforeach
</x-layout>