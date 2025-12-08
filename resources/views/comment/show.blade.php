<x-layout title="comments">
    <div style="max-width:800px;margin:0 auto;padding:1rem;">
        <h1>Comment</h1>

        <div style="border:1px solid #e2e8f0;padding:0.75rem;border-radius:6px;margin-bottom:0.75rem;">
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <strong>{{ $comment->author }}</strong>
                <small style="color:#6b7280;">
                    {{ $comment->created_at ? $comment->created_at->format('Y-m-d H:i') : '' }}
                </small>
            </div>

            <p style="margin:0.5rem 0 0 0;">{{ $comment->content }}</p>

            <p style="margin-top:0.5rem;color:#374151;font-size:0.9rem;">
                Post:
                @if (optional($comment->post)->title)
                    {{ $comment->post->title }}
                @else
                    #{{ $comment->post_id }}
                @endif
            </p>
        </div>
    </div>
</x-layout>
