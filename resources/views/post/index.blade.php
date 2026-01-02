<x-layout title="Blog">
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>By {{ $post->author }}</p>
        <div>{{ $post->body }}</div>
        <div>
            <a href="{{ route('blog.edit', $post->id) }}">Edit</a>
            <form method="POST" action="{{ route('blog.destroy', $post->id) }}" style="display:inline;"
                onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="color: red;">Delete</button>
            </form>
        </div>
    @endforeach
</x-layout>
