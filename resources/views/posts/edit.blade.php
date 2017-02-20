@extends('layouts.main')

@section('content')

<h1>Edit Post - Post Name </h1>
<p class="lead">Edit this post below. <a href="{{ route('posts.index') }}">Go back to all posts.</a></p>
<hr>

@include('partials.alerts.errors')
@include('partials.alerts.success')


{!! Form::model($post, [
    'method' => 'PUT',
    'route' => ['posts.update', $post->id]
]) !!}

<div class="form-group">
    {!! Form::label('name', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop