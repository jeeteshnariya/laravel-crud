@extends('layouts.main')

@section('content')

<h1>{{ $post->name }}</h1>
<p class="lead">{{ $post->content }}</p>
<hr>

<section id="comments">
	@foreach ($post->comments as $comment)
		<div class="comment">
			<p>{{ $comment->name }} says...</p>
			<blockquote>{{ $comment->content }}</blockquote>
		</div>
	@endforeach
</section>

<section>
	<h3 class="title">Add a comment</h3>

	{!! Form::open([
    'route' => ['createComment', $post->id]
	]) !!}

		<div class="form-group">
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" name="content" class="form-control">
		</div>
	{!! Form::submit('Add Comment', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
<hr>
</section>

<a href="{{ route('posts.index') }}" class="btn btn-info">Back to all posts</a>
<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>

<div class="pull-right">
    <a href="#" class="btn btn-danger">Delete this post</a>
</div>

@stop

