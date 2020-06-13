@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
<div id="comment-{{ $comment->getKey() }}" class="media">
    @else
    <li id="comment-{{ $comment->getKey() }}" class="media">
        @endif
        <img class="mr-3 rounded-circle" width="50" src="{{ asset('upload/profilephoto/' . $comment->commenter->avatar) }}" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
        <div class="media-body">
            <h5 class="mt-0 mb-1">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
            <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>

            <div>
                @can('reply-to-comment', $comment)
                <button data-toggle="modal" data-target="#reply-modal-{{ $comment->getKey() }}" class="btn btn-sm btn-link text-uppercase">Balas</button>
                @endcan
                @can('edit-comment', $comment)
                <button data-toggle="modal" data-target="#comment-modal-{{ $comment->getKey() }}" class="btn btn-sm btn-link text-uppercase">Edit</button>
                @endcan
                @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();" class="btn btn-sm btn-link text-danger text-uppercase">Hapus</a>
                <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
                @endcan
            </div>

            @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Pesan</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Edit Pesan Anda Disini :</label>
                                    <textarea required class="form-control" name="message" rows="10">{{ $comment->comment }}</textarea>
                                    <small class="form-text text-muted">Kolom Isian Ini Mendukung Format <a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan

            @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Balas Pesan</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Ketik Pesan Anda Disini :</label>
                                    <textarea required class="form-control" name="message" rows="10"></textarea>
                                    <small class="form-text text-muted">Kolom Isian Ini Mendukung Format <a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Balas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan

            <br />{{-- Margin bottom --}}

            {{-- Recursion for children --}}
            @if($grouped_comments->has($comment->getKey()))
            @foreach($grouped_comments[$comment->getKey()] as $child)
            @include('comments::_comment', [
            'comment' => $child,
            'reply' => true,
            'grouped_comments' => $grouped_comments
            ])
            @endforeach
            @endif

        </div>
        @if(isset($reply) && $reply === true)
</div>
@else
</li>
@endif
