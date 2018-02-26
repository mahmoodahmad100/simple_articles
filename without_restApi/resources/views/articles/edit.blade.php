@extends('layouts.master')

@section('content')
	<div class="col-md-12 center">
        <form action="{{route('articles.update',$article)}}" enctype="multipart/form-data" method="post">
        	<input type="hidden" name="_method" value="PUT">
	        <input class="form-control" placeholder="Title" name="title" value="{{$article->title}}">
	        <label>Image</label>
	        <input name="image" class="form-control" type="file">
	        <textarea class="form-control" placeholder="Description" name="description">{{$article->description}}</textarea>
	        <button type="submit" class="btn btn-default">update</button>
	        <input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>		
	</div>
@endsection