@extends('layouts.main')

@section('content')

<h1>{{ $post->name }}</h1>
<p class="lead">{{ $post->content }}</p>
<hr>

<a href="{{ route('posts.index') }}" class="btn btn-info">Back to all posts</a>
<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>

<div class="pull-right">
    <a href="#" class="btn btn-danger">Delete this post</a>
</div>

@stop