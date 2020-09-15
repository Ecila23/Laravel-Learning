@extends ('layout')

@section ('content')
<div id="wrapper">
    <div id="page" class="container">
            <h2><?= $post->title ?></h2>
            <p><em>By {{ $user->name }}</em></p>
            <p>{{ $post->body }}</p>
            <p>
                @foreach ($post->tags as $tag)
            <a href="/posts?tag={{ $tag->name }}">{{ $tag->name }}</a>
                @endforeach
            </p>
            @can ('update-post', $post)
                <a href="/posts/<?= $post->slug ?>/edit">
                    <button>
                        Edit
                    </button>
                </a>
                <form id="delete" action="/posts/<?= $post->slug ?>" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            @endcan
    </div>
</div>
@endsection