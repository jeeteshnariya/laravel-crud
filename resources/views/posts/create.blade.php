@extends('layouts.main')

@section('content')


{!! Form::open([
    'route' => 'posts.store'
]) !!}

<h1>Add a New Task</h1>
<p class="lead">Add to your task list below.<a href="{{ route('posts.index') }}">Go back to all posts.</a></p>
<hr>

@include('partials.alerts.errors')
@include('partials.alerts.success')

<div class="form-group">
    {!! Form::label('name', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New Posts', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection