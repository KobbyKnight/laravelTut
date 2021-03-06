@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-md-6 col-md-offset-3 col-lg-offset-3">
	<div class="panel panel-primary">
	  <div class="panel-heading">Companies List <a class="btn btn-primary btn-sm pull-right" href="/companies/create"><span class="glyphicon glyphicon-plus-sign"></span> Add New Company</a></div>
	  <div class="panel-body">
	  
		  <ul class="list-group">
		  	@foreach($companies as $company)
		  	<li class="list-group-item"><a href="/companies/{{$company->id}}">{{ $company -> name}}</a></li>
		  	@endforeach
		  </ul>

	  </div>
	</div>
</div>
@endsection
