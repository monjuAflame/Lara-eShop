@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Category</h3>
              <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm pull-right">Category List</a>
            </div>

            <form method="POST" action="{{ route('categories.update',$category->id) }}" enctype= 'multipart/form-data'>
              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="cname">Category Name</label>
                  <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" id="cname" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" value="{{ $category->description }}" id="description" placeholder="description">
                </div>

                <div class="form-group">
                  <label for="active">Active</label><br>
                  <input type="checkbox" name="is_active"  value="{{ $category->is_active }}" {{ $category->is_active!=0? 'checked' : null }} id="is_active" require>
                </div>

                <div class="form-group">
                  <label for="image">Iamge input</label><br>
                  <img src="{{ asset('images/categories/'. $category->image) }}" style="width: 80px; height: 50px;">
                  
                  <input type="file" id="image" name="image" value="{{ old('image') }}">
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
          </div>
    </section>

@endsection