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
			        					<h3 class="box-title">Status Information</h3>
			        					<a href="{{ route('status.create') }}" class="btn btn-primary btn-sm pull-right">New Status</a>

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
								                  <th>Class</th>
								                  <th>Created</th>
								                  <th>Last Update</th>
								                  <th>Action</th>
								                </tr>
							                </thead>
							                <tbody>
							                	@foreach($statuses as $key=> $status)
								                <tr>

								                  <td>{{ ++$key }}</td>
								                  <td>{{ $status->status }}</td>
								                  <td>{{ $status->class }}</td>
								                  <td>{{ $status->created_at }}</td>
								                  <td>{{ $status->updated_at }}</td>
								                  
								                  <td>
		<a href="{{ route('status.edit',$status->id) }}" class="btn btn-primary btn-sm">Edit</a>
		<a href="{{ route('status.destroy',$status->id) }}" class="btn btn-danger btn-sm">Del</a>

            


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