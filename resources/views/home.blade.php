@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <p class="lead">
                        {{ session()->get('message') }}
                    </p>
                </div>
            @endif
        </div>

        <div class="col-md-8">
            @if(count($posts))
                @foreach($posts as $post)
                    <div class="well">
                        <div class="media">
                            <a class="pull-left mb-3" href="#">
                                <img class="media-object w-100 h-100" src="{{ asset('images/'.$post->image_path) }}">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $post->title }}</h4>
                                <p class="text-right">By {{$post->user->name}}</p>
                                <p>{{ $post->description }}</p>
                                <ul class="list-inline list-unstyled">
                                    <li>
                                        <span>
                                            <i class="glyphicon glyphicon-calendar"></i> {{ date('jS M Y', strtotime($post->updated_at)) }}
                                        </span>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        {{ $post->reviews()->count() }}
                                    </li>
                                </ul>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('show', ['slug' => $post->slug]) }}" class="btn btn-info">Read More</a>
                                    @if($post->user_id == Auth::id())
                                        <a href="{{ route('edit', ['slug' => $post->slug]) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('delete', ['slug' => $post->slug]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1 class="mx-auto my-auto text-center">No Posts Yet, Login to create one!</h1>
            @endif
        </div>
    </div>
</div>
@endsection
