@foreach($comments as $comment)
<div class="display-comment">
    <img src="{{ asset('/images/users/' . $comment->user->avatar) }}" alt="{{ $comment->user->name }} Avatar" width="40" height="40">
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->comment }}</p>
    <a href="#" id="reply">Reply</a>
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" required class="form-control" />
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="comment_id"  value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
    @include('replys', ['comments' => $comment->replies, 'post_id' => $post_id])
</div>
@endforeach
