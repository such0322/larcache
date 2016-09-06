@extends('layouts.layout')
@section('title', 'Page Title')
@section('sidebar')
    <p>This is appended to the master sidebar.</p>
    @include('public.sidebar')
@endsection
@section('content')
<script src="{{asset("/js/remarkable.js")}}"></script>
<script src="{{asset("/build/react-with-addons.min.js")}}"></script>
<div class="col-sm-9" id="content">
    
</div>
<script type="text/babel" src="{{asset("/js/test8.js")}}"></script>
@endsection