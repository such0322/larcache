@extends('layouts.layout')
@section('title', 'post page')
@section('content')
<div class="col-sm-9">
    <p>this is post page</p>
    <h3>{{$post->title}}</h3>
    <div>
        {{$post->desc}}
    </div>
    <div>
        {{$post->content}}
    </div>
</div>
@endsection