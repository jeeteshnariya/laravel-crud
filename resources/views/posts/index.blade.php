@extends('layouts.main')

@section('content')


<h1>All the Posts</h1>

@foreach($posts as $post)
   


   
    <div class="row">
    <div class="col-md-12">
 <h3>{{ $post->name }}</h3>
    <p>{{ $post->content}}</p>
    </div> 
    <div class="col-md-6"> 
        <p>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View Post</a>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
        </p>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['posts.destroy', $post->id]
        ]) !!}
            {!! Form::submit('Delete this Post?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    </div>
    <hr>
@endforeach

@endsection