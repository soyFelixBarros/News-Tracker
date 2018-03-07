@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Noticias</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
		</ol>
	</nav>

	@include('shared.posts', ['posts' => $posts, 'paginate' => true])
</div>
@endsection
