@extends('layouts.app')

@section('content')


<h1>All the Posts</h1>
<p class="lead">Add to your task list below.<a href="{{ route('posts.create') }}">Create New posts.</a></p>
<hr>

@include('partials.alerts.errors')
@include('partials.alerts.success')

    @if ( !$posts->count() )
        <h1>You have no Posts</h1>
    @else
       
        @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12">

            <h3>{{  $post->id . $post->name }}</h3>
            <p>{{ $post->content}}</p>
            <p><i>Posted {{ $post->created_at->diffForHumans() }}</i></p>
            <p><i>Posted {{ $post->getNumCommentsStr() }}</i></p>
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
                    'route' => ['posts.destroy',$post->id]
                ]) !!}
                    {!! Form::submit('Delete this Post?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <hr>
        @endforeach

    {{ $posts->links() }}

    @endif

@endsection