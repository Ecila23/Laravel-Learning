@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>All Posts</h2>
                <span class="byline">Pretend posts for learning laravel</span>
            </div>
            <ul class="style1">
			@foreach ($posts as $post)
                <li class="first">
					<h3>
						<a href="posts/{{$post->slug}}">
							<?= ucwords($post->title) ?>
						</a>
					</h3>
					<p><em>{{$post->user->name}}</em></p>
		    		<p><?= substr( $post->body , 0, 100)?>...</p>
		    	</li>
            @endforeach
			</ul>
		</div>
		<div id="sidebar">
			<div id="stwo-col">
				<div class="sbox1">
					<h2>Users</h2>
					<ul class="style2">
						<li><a href="/posts">All</a></li>
						@foreach ($users as $user)
							<li>
								<a href="/posts?user={{ $user->name }}">
									{{ $user->name }}
								</a>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="sbox2">
					<h2>Tags</h2>
					<ul class="style2">
						<li><a href="/posts">All</a></li>
						@foreach ($tags as $tag)
						<li>
							<a href="/posts?tag={{ $tag->name }}">
								{{ $tag->name }}
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection