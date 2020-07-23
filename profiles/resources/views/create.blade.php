@extends('layouts.master')
@section('content')
<div class="row page-titles">
    <div class="col-lg-5"></div>
	<div class=" col-lg-7 ">
		<h3>Profile - Add</h3> 
	</div>
</div>	
	<div class="clearfix"></div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	
    <div class="row">
        <div class="col-lg-3 "></div>
        <div class="col-lg-6 justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="Profiles-form-valide" action="{{route('store')}}" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}

                        

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="title">Title
                            	<span class="text-danger">*</span>
                            </label>
                          	
                          	<div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Title" >
                                
                            </div>
                        </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="email">Email
                                <span class="text-danger">*</span>
                            </label>
                            
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" placeholder="yoga@gmail.com" >
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="location">Location
                                <span class="text-danger">*</span>
                            </label>
                            
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" >
                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="location">phone
                                <span class="text-danger">*</span>
                            </label>
                            
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="919148445635" >
                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="title">Upload Image
                            	<span class="text-danger">*</span>
                            </label>
                          	
                          	<div class="col-sm-10">
                            	<div class="file-box">
                                    <input type="file" name="image"  class="inputfile inputfile-6" id="image" />
                                  
                                    <label for="file"><span></span>
                                         <strong>
                                                <i class="fa fa-upload" aria-hidden="true"></i>
                                                Choose a file
                                         </strong>
                                     </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="teaser"> Teaser
                            <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="description" id="description" rows="5" cols="50"></textarea>
                             
                            </div>
                        </div>
                        
                  		
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn button st-btn--primary">
                                    <span class="button__text">Submit</span>
                                </button>

                                <a href="{{route('listing')}}" class="btn button st-btn--secondary">
                                    <span class="button__text">Back</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-3 "></div>
</div>

@stop
