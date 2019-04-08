
@extends('layouts.app')

@section('content')



<div class="col-lg-9 col-md-9 col-sm-9 pull-left ">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
    
          <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>{{$companies->name}}</h1>
         <h3><?php echo $_SERVER['REMOTE_ADDR']?></h3> 
        <p class="lead">{{$companies->description}}</p>
        <p><a class="btn btn-sm btn-success pull-right" href="/projects/create/{{$companies->id}}" role="button">Create New Project</a></p>
      </div>

      <!-- Example row of columns -->
     
      <div class="row">
       @foreach($companies->projects as $project)
        <div class="col-lg-4" style="background: white; margin: 10px;">
          <h2>{{ $project->name }}</h2>
          <p class="text-danger">{{ $project->description }}</p>
          <p><a class="btn btn-primary" href="/projects/{{$project -> id}}" role="button">View Project »</a></p>
        </div>
        @endforeach
      </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <div class="sidebar-module sidebar-module-inset">
              <div class="sidebar-module">
            <h4>Side Menu</h4>
            <ol class="list-unstyled">
              <li><a href="/companies/{{$companies->id}}/edit">Edit</a></li>
              <li><a href="/companies/create/">Add Company</a></li>
              <li><a href="/projects/create/{{$companies->id}}">Add Projects</a></li>
              <li>
              <a href="#" 
                onclick="
                        var result= confirm('Do you really want to delete?');
                          if(result){
                            event.preventDefault();
                            document.getElementById('delete_com').submit();
                          }
                        ">                
                        
                        Delete</a>
              
                    <form method="POST" action="{{ route('companies.destroy',[$companies->id]) }}" id="delete_com" 
                    style="display:none;">
                    <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                    
                    
                    </form>   
              
              
              
              </li>
              <!-- <li><a href="#">Add new members</a></li> -->
            </ol>
          </div>

          <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
             
            </ol>
          </div>
        
        </div>

    @endsection


     