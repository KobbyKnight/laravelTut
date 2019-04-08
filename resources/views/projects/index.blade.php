@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-md-6 col-md-offset-3 col-lg-offset-3">
	<div class="panel panel-primary">
	  <div class="panel-heading">Projects List 
	  <a class="btn btn-primary btn-sm pull-right" href="/projects/create">
	  <span class="glyphicon glyphicon-plus-sign"></span> Add New Project</a></div>
	  <div class="panel-body">
	  
		  <ul class="list-group">
		  	@foreach($projects as $project)
		  	<li class="list-group-item"><a href="/projects/{{$project->id}}">{{$project->name}}</a></li>
		  	@endforeach
		  </ul>

	  </div>
	</div>
</div>
@endsection
