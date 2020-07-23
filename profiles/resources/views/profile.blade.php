@extends('layouts.master')
@section('content')
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
	<h3>Profile Listing</h3> </div>
 </div>
        <!-- /# column -->

        <div class="col-lg-12">
            <div class="card card-outline-primary">
                 <div class="card-title">
                    <h4 class="m-b-0">Filters</h4>
            </div>  
                <div class="card-body">
                    <form  method="get" action="{{ route('listing') }}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group has-icon search-has-icon">
                                         <label class="control-label">Title/Keyword</label>
                                         <input id="" type="text"
                                            placeholder="Search Title"
                                            value="{{app('request')->input('name')}}"
                                            name="name" class="form-control">     
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group has-icon search-has-icon">
                                         <label class="control-label">Location</label>
                                         <input  type="text" placeholder="Australia"
                                            value="{{app('request')->input('location')}}"
                                            name="location" class="form-control"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit"  class="button btn st-btn--primary btn-sm">  
                                <span class="button__text"> <i class="fa fa-check"></i> Apply</span>
                            </button>
                            <a href="{{route('listing')}}"  class="btn button st-btn--secondary"><span class="button__text">Clear Filters</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<div class="clearfix"></div>

<div class="col-md-12">
	<div class="card" style="min-height: 400px" >
        <div class="row">
            <div class="col-md-9">
                 <h4>Listing </h4>
            </div>
            <div class="col-md-3">
                <a href="{{ route('create') }}" class="btn btn button st-btn--primary m-b-10 m-l-5 pull-right">
                    <span class="button__text"><i class="fa fa-plus" aria-hidden="true"></i> Add Profiles
                    </span> 
                </a>
            </div>  
            <div class="col-md-10">
                 
            </div>
            <div class="form-group col-md-2 align-items-center">
                <div class="style-label">
                    <label class="control-label pr-3">Sort by
                    </label> 
                </div> 
                <select class="form-control" name="sort_filter" id="shortingFilterSelect" style="width: -webkit-fill-available;">
                    <option value=" " >please select 
                    </option>
                    <option value="0"
                        @if( app('request')->input('sort_filter') =='0') selected @endif>
                        latest
                    </option>
                    <option value="1"
                        @if( app('request')->input('sort_filter') =='1') selected @endif>
                         old  
                    </option> 
                </select>                               
            </div>
                          
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th>Title</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    	@if(count($profile))	
                            @foreach($profile as $value)
                                <tr> 
                                    <td>{{$value->name}}</td>     
                                    <td>{{$value->location}}</td> 
                                    <td>{{$value->phone}}</td>
                                     
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-bars"></i>
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                   
                                                    

                                                    <a href="{{route('edit',
                                                                [$value->id])}}" title="Edit">
                                                            <li class="dropdown-item">
                                                                Edit
                                                            </li>
                                                         </a>
                                                        <a  class="sweet-confirm"
                                                                href="#"
                                                                delete-url="{{route('delete',
                                                                [$value->id])}}"  
                                                                onclick="deleteProfile(this)" 
                                                                title="Delete" >
                                                            <li class="dropdown-item">
                                                                    Delete
                                                            </li>
                                                        </a>
                                            </ul>
                                        </div>

                                    </td>    
                                </tr>        
                            @endforeach
                    	@else
                    		  <tr><td colspan="8" class="text-center"> No profile Found.</td></tr>
                    	@endif	
                    </tbody>
                </table>
            </div>
            <div class="center-block">
                {{ $profile->appends(request()->query())->links() }}
            </div>
        </div>
    </div>	
</div>
@stop
@section('javascriptcontent')
@stop