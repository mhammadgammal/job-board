<x-layout title="Blog">

    @php
        $role = auth()->user()->role;
        $userId = auth()->user()->id;
    @endphp

    @if ($role === 'admin')
        <div class="mb-6 flex justify-end p-4">
            <a href="{{ route('blog.create') }}">
                <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded">Create</button>
            </a>
        </div>
    @endif

    @foreach ($posts as $post)
        <div class="mb-8 p-4 border rounded">
            <h2>{{ $post->title }}</h2>
            <p>By {{ $post->user->name }}</p>
            <div>{{ $post->body }}</div>
            <div>
                @if ($role === 'admin' || $role === 'editor' || $post->user_id === $userId)
                    <a href="{{ route('blog.edit', $post->id) }}">Edit</a>
                @endif

                @if ($role === 'admin' || $post->user_id === $userId)
                    <form method="POST" action="{{ route('blog.destroy', $post->id) }}" style="display:inline;"
                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red;">Delete</button>
                    </form>
                @endif

            </div>
        </div>
    @endforeach
</x-layout>
