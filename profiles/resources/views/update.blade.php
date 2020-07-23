@extends('layouts.master')
@section('content')
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3>Edit Profile</h3> 
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
    <div class="col-sm-6 justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="Profiles-form-valide" action="{{route('update')}}" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}

                        
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="title">Title
                            	<span class="text-danger">*</span>
                            </label>
                          	
                          	<div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="name" placeholder="Enter Title" value="{{(empty($errors->all()) && isset($Profiles)) ? $Profiles->name : old('name') }}">

                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="email">Email
                                <span class="text-danger">*</span>
                            </label>
                            
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" id="email" name="email" placeholder="yoga@gmail.com" value="{{(empty($errors->all()) && isset($Profiles)) ? $Profiles->email : old('email') }}">
                                
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="title">Location
                                <span class="text-danger">*</span>
                            </label>
                            
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="location" name="location" placeholder="Australia"  value="{{(empty($errors->all()) && isset($Profiles)) ? $Profiles->location : old('name') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="location">phone
                                <span class="text-danger">*</span>
                            </label>
                            
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="9148445635" value="{{(empty($errors->all()) && isset($Profiles)) ? $Profiles->phone : old('phone') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label " for="title">Upload Image
                            	<span class="text-danger">*</span>
                            </label>
                          	
                          	<div class="col-sm-10">
                          	 @if (isset($file_details))
                          		<img src="<?php echo env('IMAGE_URL');?>{{$file_details->file_path}}" class="file-image" id="upload-image-show" alt="News Image" height="50" width="50"><span class="remove-btn" onclick="removeImage(this)"> Remove </span>
                              @endif 

                           		<div class="file-box {{(isset($file_details)) ? 'hide-field' : ''}}">
                                    <input type="file" name="image"  class="inputfile inputfile-6 {{(isset($file_details)) ? 'has-file' : ''}}" id="image" />
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
                            <label class="col-sm-2 col-form-label" for="description"> Description
                            </label>
                            <div class="col-sm-10">
                                <textarea class="summernote" name="description" rows="5" cols="50">{{(empty($errors->all()) && isset($Profiles)) ? $Profiles->description : old('description') }}</textarea>
                            </div>
                        </div>
                  		
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                            	@if (isset($Profiles))
                            		<input type="hidden" class="form-control" id="news-id" name="id" value="{{$Profiles->id}}">
                            	@endif 	
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
@section('javascriptcontent')
@stop