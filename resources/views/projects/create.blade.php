@extends('layouts.app')

@section('content')

<div class="col-lg-9 col-md-9 col-sm-9 pull-left">
<div class="row col-lg-12 col-md-12 col-sm-12" style="background: white; margin: 10px;" >
          <form class="form-horizontal" method="POST" action="{{ route('projects.store') }}">
                        {{ csrf_field() }}

                        
                        <!-- <div class="form-group">
                          <label for="project-content">User</label>
                          <input class="form-control" type="text" name="u_name" id="project-content" style="" placeholder= "" disabled>
                        </div> -->


                        <div class="form-group">
                            <label for="project-name">Name<span class="required">*</span></label>

                            <input id="project-name" type="text" class="form-control" name="p_name" 
                            spellcheck="false" placeholder="Enter project Name" required >

                        </div>

                        @if($companies != null)
                            <div class="form-group">
                            <label for="project-name">Company<span class="required">*</span></label>
                              <select class="form-control" name="company_id">     
                              @foreach($companies as $company)
                              <option value="{{$company->id}}">{{$company->name}}</option>
                              @endforeach
                              </select>
                        </div>
                        @endif

                        <input id="company_id" type="hidden"  name="company_id" 
                            value="{{$company_id}}">

                        <div class="form-group">
                          <label for="project-content">Description</label>
                          <textarea class="form-control autosize-target text-left" name="description" id="project-content" style="resize: vertical;" rows="9"
                          placeholder="Enter project details"
                          >
                          
                          </textarea>
                        </div>
                        <div class="form-group">
                            <label for="project-name">Duration<span class="required">*</span></label>

                            <input id="project-name" type="number" class="form-control" name="duration" 
                            spellcheck="false" maxlength="3" minlength="1" placeholder="000" required  >

                        </div>
                        <div class="form-group">
                         <input type="submit" class="btn btn-primary" value="Submit" />
                       
                        </div>
                    </form>
   </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <div class="sidebar-module sidebar-module-inset">
              <div class="sidebar-module">
            <h4>Side Menu</h4>
            <ol class="list-unstyled">
              <li><a href="/projects">My projects</a></li>
              
              <li><a href="/projects/create">Add Projects</a></li>
             
              <!-- <li><a href="#">Add new members</a></li> -->
            </ol>
          </div>

        
        
        </div>
@endsection