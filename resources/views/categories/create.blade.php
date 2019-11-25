@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Category</h3>
              <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm pull-right">Category List</a>
            </div>

            <form method="POST" action="{{ route('categories.store') }}" enctype= 'multipart/form-data'>
            	@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="cname">Category Name</label>
                  <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}" id="cname" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" value="{{ old('description') }}" id="description" placeholder="description">
                </div>
                <div class="form-group">
                  <label for="image">Iamge input</label>
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