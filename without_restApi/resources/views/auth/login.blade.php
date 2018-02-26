@extends('layouts.master')

@section('content')
	<div class="col-md-12 center">
        <form action="{{route('postLogin')}}" method="post">
	        <input class="form-control" placeholder="Email" name="email">
	        <input class="form-control" placeholder="Password" name="password" type="password">
	        <button type="submit" class="btn btn-default">login</button>
	        <input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>		
	</div>
@endsection