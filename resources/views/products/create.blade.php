@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Product</h3>
              <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm pull-right">Product List</a>
            </div>

            <form method="POST" action="{{ route('products.store') }}" enctype= 'multipart/form-data'>
            	@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="cname">Category Name</label>
                  <select name="category_id" id="category_id" class="form-control">
                    <option value="">-----Select Category------</option>
                    @foreach( $categories as $key => $c )
                       <option value="{{ $key }}">{{ $c }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="cname">Product Name</label>
                  <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" id="product_name" placeholder="Name">
                </div>

                <div class="form-group">
                  <label for="product_code">Product Code</label>
                  <input type="text" class="form-control" name="product_code" value="{{ old('product_code') }}" id="product_code" placeholder="Product code">
                </div>

                <div class="form-group">
                  <label for="qty">Quantity</label>
                  <input type="text" class="form-control" name="qty" value="{{ old('qty') }}" id="qty" placeholder="Quantity">
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" name="price" value="{{ old('price') }}" id="price" placeholder="Price">
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" value="{{ old('description') }}" id="description" placeholder="description">
                </div>

                <div class="form-group">
                  <label for="image">Iamge input</label>
                  <input type="file" id="image" name="image" value="{{ old('image') }}">
                </div>

                <div class="form-group">
                  <label for="imageGalleries">Iamge Gallery input</label>
                  <input type="file" id="imageGalleries[]" multiple name="imageGalleries[]" >
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          </div>
          </div>
    </section>

@endsection