@extends('layouts.master')

@section('content')
	<div class="col-md-12 center">
        <form action="{{route('articles.store')}}" enctype="multipart/form-data" method="post">
	        <input class="form-control" placeholder="Title" name="title">
	        <label>Image</label>
	        <input name="image" class="form-control" type="file">
	        <textarea class="form-control" placeholder="Description" name="description"></textarea>
	        <button type="submit" class="btn btn-default">Save</button>
	        <input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>		
	</div>
@endsection