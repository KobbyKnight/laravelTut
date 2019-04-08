@extends('layouts.app')

@section('content')

<div class="col-lg-9 col-md-9 col-sm-9 pull-left">
<div class="row col-lg-12 col-md-12 col-sm-12" style="background: white; margin: 10px;" >
          <form class="form-horizontal" method="POST" action="{{ route('companies.store') }}">
                        {{ csrf_field() }}

                        
                        <!-- <div class="form-group">
                          <label for="company-content">User</label>
                          <input class="form-control" type="text" name="u_name" id="company-content" style="" placeholder= "" disabled>
                        </div> -->


                        <div class="form-group">
                            <label for="company-name">Name<span class="required">*</span></label>

                            <input id="company-name" type="text" class="form-control" name="c_name" 
                            spellcheck="false" placeholder="Enter Company Name" required >

                        </div>

                        <div class="form-group">
                          <label for="company-content">Description</label>
                          <textarea class="form-control autosize-target text-left" name="description" id="company-content" style="resize: vertical;" rows="9"
                          placeholder="Enter company details"
                          >
                          
                          </textarea>
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
              <li><a href="/companies">My Companies</a></li>
              
              <li><a href="/projects/create">Add Projects</a></li>
             
              <!-- <li><a href="#">Add new members</a></li> -->
            </ol>
          </div>

        
        
        </div>
@endsection