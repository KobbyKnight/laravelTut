
@extends('layouts.app')

@section('content')



<div class="col-lg-9 col-md-9 col-sm-9 pull-left">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
    
    <div class="row col-lg-12 col-md-12 col-sm-12" style="background: white; margin: 10px;" >
          <form class="form-horizontal" method="POST" action="{{ route('companies.update',[$companies->id]) }}">
                        {{ csrf_field() }}

        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="company-name">Name<span class="required">*</span></label>

                            <input id="company-name" type="text" class="form-control" name="c_name" 
                            spellcheck="false" placeholder="Enter Company Name" value="{{ $companies->name }}" required >

                        </div>

                        <div class="form-group">
                          <label for="company-content">Description</label>
                          <textarea class="form-control autosize-target text-left" name="description" id="company-content" style="resize: vertical;" rows="9">{{$companies->description}}</textarea>
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
              <li><a href="/companies/{{$companies->id}}/show">View Companies</a></li>
              <li><a href="/companies/{{$companies->id}}">All Companies</a></li>
              <!-- <li><a href="#">Add new members</a></li> -->
            </ol>
          </div>

         <!--  <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li> -->
             
            </ol>
          </div>
        
        </div>
      </div>

    @endsection


     