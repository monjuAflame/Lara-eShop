@extends('layouts.app')
@section('content')
<style type="text/css">
	.modal.and.carousel{
		position: fixed;
	}
	.carousel-indicators li {
    	box-shadow: 0 0 11px #000;
	}
</style>
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
			        					<h3 class="box-title">Product Information</h3>
			        					<a href="{{ route('products.create') }}" class="btn btn-primary btn-sm pull-right">New Product</a>
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
								                  <th>Category</th>
								                  <th>Prduct Name</th>
								                  <th>P-Code</th>
								                  <th>Quantity</th>
								                  <th>Price</th>
								                  <th>Description</th>
								                  <th>Active</th>
								                  <th>Image</th>
								                  <th>Action</th>
								                </tr>
							                </thead>
							                <tbody>
							                	@foreach($products as $key=> $p)
								                <tr>

								                  <td>{{ ++$key }}</td>
								                  <td>{{ $p->category->category_name }}</td>
								                  <td>{{ $p->product_name }}</td>
								                  <td>{{ $p->product_code }}</td>
								                  <td>{{ $p->qty }}</td>
								                  <td>{{ $p->price }}</td>
								                  <td>{{ $p->description }}</td>
								                  <td>{{ $p->is_active }}</td>
								                  <td>
								                  		<img src="{{ asset('images/products/'. $p->image) }}" style="width: 80px; height: 50px;">
								                  </td>
								                  <td>
		<a href="{{ route('products.edit',$p->id) }}" class="btn btn-primary btn-sm">Edit</a>

		<a href="{{ route('products.destroy',$p->id) }}" onclick="event.preventDefault();
                               document.getElementById('product-frm-delete').submit();" class="btn btn-danger btn-sm">Del</a>
        <a href="#lightbox" data-toggle="modal" data-id="{{ $p->id }}"  class="btn btn-info btn-sm viewImage">View Image</a>                      

            <form id="product-frm-delete" action="{{ route('products.destroy',$p->id) }}" method="POST" >
                     @csrf
                     @method('DELETE')

                     <input type="hidden" name="id" value="{{ $p->id }}">

            </form>


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
    <div class="modal fade and carousel slide" id="lightbox">

    </div>
@endsection
@section('script')
	<script>
		$('.viewImage').on('click', function(){
			product_id = $(this).data('id');
			// alert(product_id);
			 console.log(product_id);
			$.get("{{ route('products.index')}}",{product_id:product_id}, function(data){
				$('#lightbox').html(data);

            });
		});
	</script>
@endsection