@extends('layouts.doc')
@section('title', 'Docs')
@section('content')
<div class="container">
@include('docs.overview')
@include('docs.facebook')
@include('docs.instagram')
@include('docs.twitter')
@include('docs.reddit')
@include('docs.telegram')
@include('docs.discord')
@include('docs.pintrest')
</div>
<script>
    hljs.highlightAll();
</script>
@endsection