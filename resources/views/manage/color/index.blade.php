@extends('layouts.app')
@section('content')
    <section class="content">
	    <div class="box">
	        <div class="box-header with-border">
			    <h1 class="box-title">List</h1>
			    <div class="box-tools pull-right">
			    	<button>  </button>
			    </div>
			</div>
			
			<div class="box-body">
			        	<div class="row">
			        		<div class="col-xs-12">
			        			<div class="box">
			        				<div class="box-header">
			        					<h3 class="box-title">Color Information</h3>
			        					<a href="{{ route('color.create') }}" class="btn btn-primary btn-sm pull-right">New Color</a>

			        					<a href="{{ route('color.restore') }}" class="btn btn-danger btn-sm pull-right">Restore</a>

			        				</div>
			@if (Session::has('successMessage'))
              <div class="alert alert-success">{{ Session::get('successMessage')}}</div>
            @endif
            @if(Session::has('dangerMessage'))
				<div class="alert alert-danger">{{ Session::get('dangerMessage')}}</div>
            @endif

			        				 <div class="box-body">
							            <table id="example2" class="table table-bordered table-hover">
							                <thead>
								                <tr>
								                  <th>#</th>
								                  <th>Name</th>
								                  <th>Description</th>
								                  <th>Created</th>
								                  <th>Last Update</th>
								                  <th>Action</th>
								                </tr>
							                </thead>
							                <tbody>
							                	@foreach($colors as $key=> $color)
								                <tr>

								                  <td>{{ ++$key }}</td>
								                  <td>{{ $color->color_name }}</td>
								                  <td>{{ $color->description }}</td>
								                  <td>{{ $color->created_at }}</td>
								                  <td>{{ $color->updated_at }}</td>
								                  
								                  <td>
		<a href="{{ route('color.edit',$color->id) }}" class="btn btn-primary btn-sm">Edit</a>
		<a href="{{ route('color.destroy',$color->id) }}" class="btn btn-danger btn-sm">Del</a>

            


								                  </td>

								                </tr>
								                @endforeach
								            </tbody>
							              </table>
							        </div>
			        			</div>
			        		</div>
			        	</div>
			        </div>


	    </div>
    </section>

@endsection