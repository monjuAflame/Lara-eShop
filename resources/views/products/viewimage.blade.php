

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<ol class="carousel-indicators">
					@foreach($imageGalleries as $key => $ig )
						<li data-target="#lightbox" data-slide-to="{{ $key }}" class="{{ $key==0 ? 'active' : null }}"></li>
					@endforeach
				</ol>
				<div class="carousel-inner">

					@foreach($imageGalleries as $key => $ig )
						<div class="item {{ $key==0 ? 'active' : null }}">
							<img src="{{ asset('images/galleries/'. $ig->gallery_image) }}" alt="">
						</div>
					@endforeach
					
					
				</div>

				<a href="#lightbox" role="button" data-slide="prev" class="left carousel-control">
					<i class="fa fa-left"></i>
				</a>

				<a href="#lightbox" role="button" data-slide="next" class="right carousel-control">
					<i class="fa fa-left"></i>
				</a>




			</div>
		</div>
	</div>
