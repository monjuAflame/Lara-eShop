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
			        					<a href="{{ route('color.index') }}" class="btn btn-primary btn-sm pull-right">Color list</a>

			        					<a href="{{ route('color.restore') }}" onclick="event.preventDefault();document.getElementById('rest-form').submit();" class="btn btn-danger btn-sm pull-right">Restore(S)</a>

			        				</div>
			@if (Session::has('successMessage'))
              <div class="alert alert-success">{{ Session::get('successMessage')}}</div>
            @endif
            @if(Session::has('dangerMessage'))
				<div class="alert alert-danger">{{ Session::get('dangerMessage')}}</div>
            @endif

			        				 <div class="box-body">

			        		<form action="{{ route('color.restore.info') }}" method="GET" id="rest-form">
							            <table id="example2" class="table table-bordered table-hover">
							                <thead>
								                <tr>
								                  <th>
								                  	<input type="checkbox" id="chk">
								                  </th>
								                  <th>#</th>
								                  <th>Name</th>
								                  <th>Description</th>
								                  <th>Created</th>
								                  <th>Last Update</th>
								                  <th>Last Delete</th>
								                  <th>Action</th>
								                </tr>
							                </thead>
							                <tbody>
							                	@foreach($colors as $key=> $color)
								                <tr>
								                  <td>
								                  	<input type="checkbox" name="id[]" value="{{ $color->id }}" class="id">
								                  </td>
								                  <td>{{ ++$key }}</td>
								                  <td>{{ $color->color_name }}</td>
								                  <td>{{ $color->description }}</td>
								                  <td>{{ $color->created_at }}</td>
								                  <td>{{ $color->updated_at }}</td>
								                  <td>{{ $color->deleted_at }}</td>
								                  
								                  <td>
		<a href="{{ route('color.restore.info',$color->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i></a>

            


								                  </td>

								                </tr>
								                @endforeach
								            </tbody>
							              </table>
							          </form>
							        </div>
			        			</div>
			        		</div>
			        	</div>
			        </div>


	    </div>
    </section>

@endsection
@section('script')
	<script>
		$('#chk').on('change',function(){
			$('input[class=id]').not(this).prop('checked',this.checked);
		});

		$('input[class=id]').on('change',function(e){
			$('input[id=chk]').not(this).prop('checked',this.checked);
		});


	</script>
@endsection