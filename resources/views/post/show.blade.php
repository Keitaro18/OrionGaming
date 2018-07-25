@extends('layouts.navArticles')

@section('articles')

<div class="container">
        <div>
    <h1 class="title">
    {{ $post->title }}
    </h1>

    <img class="image" href="{{ Voyager::image($post->image) }}" >

    <p class="body">
    {!! $post->body !!}
    </p>
        </div>
</div>

@stop