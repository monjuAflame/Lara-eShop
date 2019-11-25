@extends('frontend.master')

@section('content')
	
	{{ $products->render() }}

	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<ul class="breadcrumb">
				<li class="breadcrumb-iteam active">Home</li>
				<li></li>
			</ul>

			<div class="card-body">
				
				<div class="row">
				@foreach($products as $key => $p)
					<div class="col-lg-3 col-md-3 col-sm-12">
						<form action="{{ route('cart.add',$p->id) }}" method="GET">
							<div class="card">
								<h6 class="card-title bg-info text-white p-2 text-uppercase">
									{{ $p->product_name }}
								</h6>
								<div class="card-body">
									<img src="{{ asset('images/products/'.$p->image) }}" alt="phone" class="img-fluid mb-2" style="width: 100%;height: 150px;">
									<h6>&#8377 {{ $p->price }}<span>({{ $p->discount }}% off)</span></h6>
									<h6 class="badge badge-success"> 4.4 <i class="fa fa-star"></i></h6>
								</div>
								<div class="btn-group d-flex">
									<button class="btn btn-success flex-pill">Add to cart</button>
									<a href="{{ route('customer.like',$p->id) }}" class="btn btn-{{ $p->like ? 'danger' : 'warning' }} flex-pill text-white">
										{!! $p->like ? '<i class="fa fa-heart-o"></i>' : 'Like' !!}
									</a>
								</div>



							</div>
						</form>
					</div>
				@endforeach
				</div>

			</div>



		</div>
	</div>




@endsection
