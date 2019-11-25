@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Product</h3>
              <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm pull-right">Product List</a>
            </div>
            
            <form method="POST" action="{{ route('products.update',$product->id) }}" enctype= 'multipart/form-data'>
            	@csrf
              @method('PUT')
              <div class="col-md-8">
                <div class="box-body">
                <div class="form-group">
                  <label for="cname">Category Name</label>
                  <select name="category_id" id="category_id" class="form-control">
                    <option value="">-----Select Category------</option>
                    @foreach( $categories as $key => $c )
                       <option value="{{ $key }}" {{ $product->category_id==$key ? 'selected' : null }} >{{ $c }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="cname">Product Name</label>
                  <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" id="product_name" placeholder="Name">
                </div>

                <div class="form-group">
                  <label for="product_code">Product Code</label>
                  <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}" id="product_code" placeholder="Product code">
                </div>

                <div class="form-group">
                  <label for="qty">Quantity</label>
                  <input type="text" class="form-control" name="qty" value="{{ $product->qty }}" id="qty" placeholder="Quantity">
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" name="price" value="{{ $product->price }}" id="price" placeholder="Price">
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" value="{{ $product->description }}" id="description" placeholder="description">
                </div>
                
              </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="image">Iamge input</label><br>
                  <img src="{{ asset('images/products/'. $product->image) }}" style="width: 80px; height: 50px;">
                  <input type="file" id="image" name="image" value="{{ old('image') }}">
                </div>

                <div class="form-group">
                  <label for="imageGalleries">Iamge Gallery input</label><br>
                  @foreach($imageGalleries as $key=> $ig)
                     <img src="{{ asset('images/galleries/'. $ig->gallery_image) }}" style="width: 80px; height: 50px;">
                  @endforeach
                  <input type="file" id="imageGalleries[]" multiple name="imageGalleries[]" >
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          </div>
          </div>
    </section>

@endsection