<x-layout title="Blog">
    <h2>{{ $post->title }}</h2>
    <p>By {{ $post->author }}</p>
    <div>{{ $post->body }}</div>
</x-layout>
