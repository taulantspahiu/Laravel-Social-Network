@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="dashboard col-xs-8 col-xs-offset-2">
        <section class="row new-post">
            <div class="col-md-8 col-md-offset-2">
                <header><h3>What do you have to say?</h3></header>
                <form action="{{ route('post.create') }}" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </section>
        <section class="row posts">
            <div class="col-md-8 col-md-offset-2">
                <h3>What other people say?</h3>
                @foreach($posts as $post)
                    <article class="post" data-postid="{{ $post->id }}">
                        <p id="post-edit">{{ $post->body }}</p>
                        <div class="info">
                            Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                        </div>
                        <div class="interaction">
                            <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                            <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                            @if(Auth::user() == $post->user)
                                |
                                <a href="#" class="edit" data-postid="{{ $post->id }}">Edit</a> |
                                <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
        
        <div class="modal fade edit-modal" tabindex="-1" role="dialog" id="edit-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit-save">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </section>
    
    <script>
        var token = '{{ Session::token() }}';
        //var url = '{{ route("post.edit") }}';
        var urlEdit = '{{ route("post.edit") }}';
        var urlLike = '{{ route("post.like") }}';
    </script>
@endsection