@extends('layouts.layout')
@section('title', 'Page Title')
@section('sidebar')
    <p>This is appended to the master sidebar.</p>
    @include('public.sidebar')
@endsection
@section('content')

<div class="col-sm-9" id="content">
    
</div>
<script type="text/babel" src="{{asset("/js/test5.js")}}"></script>
@endsection