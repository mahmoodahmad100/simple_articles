@extends('layouts.master')

@section('content')
	<div class="col-md-12 center">
		<h2>All the articles</h2>
		@if(Auth::user())
			<a href="{{route('articles.create')}}" class="btn btn-success" style="margin:10px;">New article</a> <br>
		@endif
		@foreach($articles as $article)
			<a href="{{route('articles.show',$article)}}" class="btn btn-primary">{{$article->title}}</a>
		@endforeach
	</div>
@endsection