@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row">
    <div class="col-sm-9">
    @include('shared.posts', ['posts' => $posts])
    </div>
    <div class="col-sm-3">
    @if (count($newspapers) > 0)
    @include('sidebar.newspapers', ['newspapers' => $newspapers])
    @endif
    </div>
</div><!-- .row -->
@endsection
