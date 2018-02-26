@extends('layouts.master')

@section('content')
	<div class="col-md-12 center">
		<h2>{{$article->title}}</h2>
		<img src="{{URL::to('uploads/images/'.$article->image)}}" alt="loading..." class="img-responsive">
		<p>{{$article->description}}</p>
		@if(Auth::user())
			<a href="{{route('articles.edit',$article)}}" class="btn btn-success">update</a>
			<form action="{{route('articles.destroy',$article)}}" method="post" style="margin-top:10px;">
				<input type="hidden" name="_method" value="DELETE">
				<button type="submit" class="btn btn-danger">delete</button>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		@endif
	</div>
@endsection