@extends('layouts.layout')
@section('title', 'Page Title')
@section('sidebar')
    <p>This is appended to the master sidebar.</p>
    @include('public.sidebar')
@endsection
@section('content')
<div class="col-sm-9">
    <p>This is my body content.</p>
    {{$aaa}}
</div>
@endsection