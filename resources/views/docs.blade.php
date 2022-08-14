@extends('layouts.doc')
@section('title', 'Docs')
@section('content')
<div class="container">
@include('docs.overview')
@include('docs.facebook')
@include('docs.instagram')
@include('docs.twitter')
</div>
<script>
    hljs.highlightAll();
</script>
@endsection