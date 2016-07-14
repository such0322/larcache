@extends('layouts.layout')
@section('title', 'Page Title')
@section('content')
<div class="col-sm-9">
    <p>this is list page</p>
    <ul>
        @foreach ($posts as $post)
        <li>{{ $post->id }}. <a href="{{asset('/post/'.$post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>

    <nav>
        {!!$posts!!}
    </nav>
</div>
@endsection