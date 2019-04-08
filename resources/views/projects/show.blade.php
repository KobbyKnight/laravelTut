
@extends('layouts.app')

@section('content')



<div class="col-lg-9 col-md-9 col-sm-9 pull-left ">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
    
          <!-- Jumbotron -->
      <div class="well well-lg">
        <h1>{{$projects->name}}</h1>
        <p class="lead">{{$projects->description}}</p>
      </div>
<div class="row col-md-12 col-lg-12 col-sm-12" style="background: none; padding:10px; width:wrap-content;">
<p><a class="btn btn-sm btn-success pull-right" href="/projects/create" role="button">Create New Project</a></p>
</div>


@foreach($projects->commentable as $comment)
<div class="row container-fluid col-md-12 col-lg-12 col-sm-12" style="background: white; padding:10px; width:wrap-content;">

<ol class="list-unstyled">
<li class="list-group-item"><h4><strong>{{$comment->url}}</strong></h4></li>
<li class="list-group-item"><p>{{$comment->body}}</p> </li>
<li class="pull-right list-group-item"><i>By:  </i>{{$comment->user->name}} </li>
</ol>

</div>
@endforeach
<div class="row container-fluid" >
  <form class="form-horizontal" method="POST" action="{{ route('comments.store') }}">
                        {{ csrf_field() }}

    <input type="hidden" name="commentable_id" value="{{$projects->id}}">
    <input type="hidden" name="commentable_type" value="App\Project">

                        <div class="form-group">
                          <label for="comment-content">Comments</label>
                          <textarea class="form-control autosize-target text-left" name="comment" id="comment-content" style="resize: vertical;" rows="5"
                          placeholder="Enter comment" required
                          >                          
                          </textarea>
                        </div>

                        <div class="form-group">
                          <label for="comment-content">URL/Proof of Work </label>
                          <textarea class="form-control autosize-target text-left" name="url" id="comment-content" style="resize: vertical;" rows="2"
                          placeholder="Enter URL/Proof of work" required
                          >                          
                          </textarea>
                        </div>

                        <div class="form-group">
                         <input type="submit" class="btn btn-primary" value="Submit" />
                       
                        </div>
                    </form>

</div>






      <!-- Example row of columns -->
     
      <div class="row">
    {{--   @foreach($project->projects as $project)
      <div class="col-lg-4" style="background: white; margin: 10px;">
        <h2>{{ $project->name }}</h2>
        <p class="text-danger">{{ $project->description }}</p>
        <p><a class="btn btn-primary" href="/projects/{{$project -> id}}" role="button">View Project »</a></p>
      </div>
      @endforeach --}}
      </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <div class="sidebar-module sidebar-module-inset">
              <div class="sidebar-module">
            <h4>Side Menu</h4>
            <ol class="list-unstyled">
            <li><a href="/projects/{{$projects->id}}/edit">Edit</a></li>

            <li><a href="/projects/create">Add Project</a></li>

            <li><a href="/projects/">My Projects</a></li>
          <br>
         
          @if(($projects->user_id == Auth::user()->id))
              <li>
              <a href="#" 
                onclick="
                        var result= confirm('Do you really want to delete?');
                          if(result){
                            event.preventDefault();
                            document.getElementById('delete_prj').submit();
                          }
                        ">                
                        
                        Delete</a>
              
                    <form method="POST" action="{{ route('projects.destroy',[$projects->id]) }}" id="delete_com" 
                    style="display:none;">
                    <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                    
                    
                    </form> 
              </li>
@endif
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


     